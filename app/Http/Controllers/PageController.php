<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    protected $courses = array();

    public function registerCourses(Request $request){
        $coursesSelected = $request->validate([
            'course' => 'array | size: 4 '
        ]);
        $user = Auth::user();

        $courses = implode(", " , $coursesSelected['course']);

    
            $user->course()->create(['courses' => $courses]);
            
            foreach ($coursesSelected['course'] as $value) {
                $$value = DB::table($value)->select('id', 'question', 'answer', 'option1', 'option2', 'option3')->inRandomOrder()->get();
    
                $this->courses[$value] = $$value;
            }

            $coursesQuestion = $this->courses;

            return view("startQuiz", compact("user", "coursesQuestion", "coursesSelected"));
    }

}
