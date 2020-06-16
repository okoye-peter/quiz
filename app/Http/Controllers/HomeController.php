<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    protected $courses;
    protected $question;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user  = \Auth::user();
        // check if user have registered courses
        if (auth()->user()->registered_courses) {
            $this->courses = json_decode(auth()->user()->registered_courses->courses);
            foreach ($this->courses->course as $value) {
                $$value = DB::table($value)->select('id', 'question', 'answer', 'option1', 'option2', 'option3')->inRandomOrder()->get();
                $this->question[$value] = $$value;
            }
            $questions = $this->question;
            $courses = $this->courses->course;
            return view("startQuiz", compact("user", "questions", "courses"));
        } else {
            # code...
            $courses = Course::pluck("course");

            return view('home',compact('user', 'courses'));
        }
    }
}
