<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    protected $question = array();
    protected $time = 0;

    public function fetch_course_questions(string $course){
        return Course::where('course', $course)->with('questions')->first()->questions;
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

    public function registerCourses(Request $request){
        $courses = $request->validate([
            'course' => 'array | size: 4 '
        ]);

        $user = Auth::user();
    
        $user->registered_courses()->create(['courses' => json_encode($courses), 'started' => now() ]);
        
        // looping through the courses and fetching the questions
        foreach ($this->courses->course as $value) {
            $$value = $this->fetch_course_questions($value);
            $this->question[$value] = $$value;
        }

        $questions = $this->question;
        $time_remaining = $this->setTime($user->registered_courses->started, $this->time);
        
        return view("startQuiz", compact("user", "questions", "courses", 'time_remaining'));
    }

}
