<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    protected $courses;
    protected $question = array();
    protected $time = 0;

    public function fetch_course_questions(string $course){
        $course = Course::where('course', $course)->with('questions')->first();
        $this->time += $course->time_limit;
        return $course->questions;
    }

    public function setTime($start_time, $time_limit){
        // create a date from the time you started the quiz
        $date = date_create($start_time);
        // add the time given to finish quiz to time you started the quiz
        date_add($date, date_interval_create_from_date_string("$time_limit seconds"));
        // check the difference between the time now and the date to know if your time is exhausted
        $time_diff = date_diff(now(), $date);
        // if time is exhuasted submit your quiz set the time remaining
        if($time_diff->invert === 1 ){
            ddd("time exhausted");
        }else{
            $hrs = $time_diff->h;
            $mins = $time_diff->i;
            $secs = $time_diff->s;
            return (object)[
                'hour' => $hrs,
                'minute' => $mins,
                'second' => $secs
            ];
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user  = \Auth::user()->with('registered_courses')->first();
        // check if user have registered courses
        if ($user->registered_courses) {
            $this->courses = json_decode($user->registered_courses->courses);
            // looping through the courses and fetching the questions
            foreach ($this->courses->course as $value) {
                $$value = $this->fetch_course_questions($value);
                $this->question[$value] = $$value;
            }

            $questions = $this->question;
            $courses = $this->courses->course;
            $time_remaining = $this->setTime($user->registered_courses->started, $this->time);
            return view("startQuiz", compact("user", "questions", "courses", 'time_remaining'));
        } else {
            # code...
            $courses = Course::pluck("course");
            return view('home',compact('user', 'courses'));
        }
    }
}
