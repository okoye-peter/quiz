<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Question;
use App\RegisteredCourses;
use App\Result;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin.routes', 'auth']);
    }

    // load all users that are not admin with their courses and result
    public function index()
    {
        $users = User::where('isadmin', false)->with('registered_courses', 'result')->get();
        //number of people that have completed the quiz
        $completed = $users->filter(function($user){
            if ($user->registered_courses) return  $user->registered_courses->completed === 1;
            return false;
        })->count();
        // number of people that are yet to registered their courses
        $pending = $users->filter(function($user){
            if (!$user->registered_courses) return  true;
            return false;
        })->count();
        // number of people that have registered but not started the quiz
        $notStarted = $users->filter(function($user){
            if ($user->registered_courses) return  $user->registered_courses->started === null;
            return false;
        })->count();

        // number of people currently taking the quiz
        $inProgress = $users->filter(function($user){
            if ($user->registered_courses) return  ($user->registered_courses->completed === 0 && $user->registered_courses->started);
            return false;
        })->count();
        // number of all users
        $all = $users->count();
        return view('admin.dashboard', compact('users','all','completed','pending','notStarted','inProgress'));
    }

    // load a single user details
    public function userProfile(User $user)
    {

        $courses = Course::orderBy('course', 'ASC')->get();
        $registered_courses = $user->registered_courses ?  json_decode($user->registered_courses->courses) : 'not yet registered';
        $started_at =  $user->registered_courses ?  $user->registered_courses->started : '';
        $id = $user->registered_courses ?  $user->registered_courses->id : '';
        $result = $user->result ? json_decode($user->result->scores) : 'not available';
        return view('admin.user_profile', compact('user', 'result', 'courses', 'registered_courses', 'id', 'started_at'));
    }

    // update user details
    public function userProfileUpdate(User $user, Request $request)
    {
        $data = tap($request->validate([
            'name' => 'required|string',
            'birth' => 'required|date',
            'nationality' => 'required|string',
            'gender' => 'required|string|max:1',
            'email' => 'required|email|string',
            'address' => 'required|string',
            'city' => 'required|string',
        ]), function(){
            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'file|image|max:4000'
                ]);
            }
        });
        if (request()->hasFile('image')) {
            $name = $_FILES['image']['tmp_name'];
            // upload image to cloud
            Cloudder::upload($name, null);
            // get the url of the image
            $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => 150, "height" => 150]);

            $data['image'] = $image_url;
        }
        
        if ($user->update($data)) {
            return back()->with('success', "$request->name credentials updated successfully");
        }

        return back()->withErrors(['failed' => "sorry something went wrong"]);
    }

    // update user course
    public function registered_course_update(RegisteredCourses $registered_course, Request $request)
    {
        $user = auth()->user();
        $data = json_encode($request->validate([
            'course' => 'array | size:4'
        ]));

        $courses = Course::orderBy('course', 'ASC')->get();
        $registered_courses = json_decode($user->registered_courses->courses);
        $id = $user->registered_courses->id;
        $result = $user->result ? json_decode($user->result->scores) : 'not available';

        if ($registered_course->update(['courses' => $data])) {
            return back()->with('success', "Courses updated successfully", compact('registered_courses','result', 'courses', 'user'));
        }

        return back()->withErrors(["failed"=> "sorry something went wrong"]);
    }

    // show all available courses
    public function courses()
    {
        $courses = Course::with('questions')->paginate(20);
        return view('admin.course', compact('courses'));
    }

    // create a new course
    public function course_create(Request $request)
    {
        $course = collect($request->course);
        $time = collect($request->time_limit);
        $course->each(function($value , $index) use ($time){
            // check if the course title and time limit is defined
            if ($value != null && $time[$index] != null ) {
                Course::create([
                    'course' => $value,
                    'time_limit' => $time[$index],
                ]);
            }
        });
        return back()->with('msg', "Course(s) created successfully");
    }

    // update course detail
    public function course_update(Course $course)
    {
        $data = json_decode(file_get_contents('php://input'));
        if ($data->column == 'time_limit') {
            $data->value = (int)$data->value;
        }

        if($course->update([$data->column => $data->value])){
            return 1;
        }else{
            return 0;
        }
    }

    // delete a course
    public function course_delete(Course $course)
    {
        $name = $course->course; 
        $course->delete();
        return back()->with('msg', "$name deleted successfuly");
    }

    // add course questions
    public function question_create(Course $course, Request $request)
    {
        $questions = collect($request->question);
        $answers = collect($request->answer);
        $option1s = collect($request->option1);
        $option2s = collect($request->option2);
        $option3s = collect($request->option3);
        $questions->each(function($value , $index) use ($answers, $option1s, $option2s, $option3s, $course){
            // check if the question, answer and option are defined
            if ($value != null && $answers[$index] != null && $option1s[$index] != null && $option2s[$index] != null && $option3s[$index] != null) {
                $course->questions()->create([
                    
                    'question' => $value,
                    'answer' => $answers[$index],
                    'option1' => $option1s[$index],
                    'option2' => $option2s[$index],
                    'option3' => $option3s[$index],
                ]);
            }
        });
        return back()->with('msg', 'Qusetion(s) created successfully');
        
    }

    // view course questions
    public function fetch_questions(Course $course)
    {
        $questions = $course->questions;
        return view('admin.question', compact('course','questions'));
    }

    // update course questions
    public function question_update(Question $question)
    {
        $data = json_decode(file_get_contents('php://input'));
        if($question->update([$data->column => $data->value])){
            return 1;
        }else{
            return 0;
        }
    }

    // delete a course question
    public function question_delete(Question $question)
    {
        $question->delete();
        return back()->with('msg', 'Question deleted seccessfully');
    }

    // delete a user or make a user an admin or reset user quiz time
    public function decision(Request $request)
    {
        $users_id = $request->users_id ? explode(',',$request->users_id[0]) : [];
        
        if ($request->action === 'Delete Permanently' && !empty($users_id)) {
            collect($users_id)->each(function($id){
                User::find($id)->delete();
            });
            return back()->with("msg", "user(s) deleted successfully");
        } elseif ($request->action === 'Make Admins' && !empty($users_id)) {
            collect($users_id)->each(function($id){
                User::find($id)->update(['isadmin'=> 1]);
            });
            return back()->with("msg", "user(s) have been made Admins");
        }elseif ($request->action === 'Restart Quiz' && !empty($users_id)) {
            collect($users_id)->each(function($id){
                $user  = User::find($id);
                if ($user->registered_courses  && !$user->result) {
                    $user->registered_courses()->update(['completed' => 0, "started" => null]);
                }
            });
            return back()->with("msg", "user(s) have been update and can start their quiz now.");
        }else {
            return back();
        } 
        
    }

    public function results()
    {
        $results = Result::with('user')->paginate(50);
        return view('admin.results', compact('results'));
    }

    public function profile(User $user)
    {
        return view('admin.profile', compact('user'));
    }

    public function complaint()
    {
        $complaints  = DB::table('issues')->select('*')->latest()->paginate(15);

        return view('admin.complaint', compact('complaints'));
    }
}
