<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Question;
use App\RegisteredCourses;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.routes');
        $this->middleware('auth');
    }


    public function index()
    {
        $users = User::where('isadmin', false)->with('registered_courses', 'result')->get();
        return view('admin.dashboard', compact('users'));
    }

    public function userProfile(User $user)
    {
        $courses = Course::orderBy('course', 'ASC')->get();
        $registered_courses = $user->registered_courses ?  json_decode($user->registered_courses->courses) : 'not yet registered';
        $id = $user->registered_courses ?  $user->registered_courses->id : '';
        $result = $user->result ? json_decode($user->result->scores) : 'not available';
        return view('admin.user_profile', compact('user', 'result', 'courses', 'registered_courses', 'id'));
    }

    public function userProfileUpdate(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'birth' => 'required|date',
            'nationality' => 'required|string',
            'gender' => 'required|string|max:1',
            'email' => 'required|email|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'image' => 'sometimes|image|max:2500'
        ]);

        if ($request->image != null) {
            $name = $_FILES['avatar']['tmp_name'];
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

    public function courses()
    {
        $courses = Course::with('questions')->paginate(20);
        return view('admin.course', compact('courses'));
    }

    public function course_create(Request $request)
    {
        $data = $request->validate([
            'course' => 'required|string',
            'time_limit' => 'required|integer'
        ]);
                
        Course::create($data);
        $course = $data['course'];
        return back()->with('msg', "$course created successfully");
    }

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

    public function course_delete(Course $course)
    {
        $name = $course->course; 
        $course->delete();
        return back()->with('msg', "$name deleted successfuly");
    }

    public function question_create(Course $course, Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
        ]);

        $data['course_id'] = $course->id;
        Question::create($data);
        return back()->with('msg', 'Qusetion created successfully');
        
    }

    public function fetch_questions(Course $course)
    {
        $questions = $course->questions;
        return view('admin.question', compact('course','questions'));
    }

    public function question_update(Question $question)
    {
        $data = json_decode(file_get_contents('php://input'));
        if($question->update([$data->column => $data->value])){
            return 1;
        }else{
            return 0;
        }
    }

    public function question_delete(Question $question)
    {
        $question->delete();
        return back()->with('msg', 'Question deleted seccessfully');
    }
}
