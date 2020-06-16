<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    protected $question = array();

    public function registerCourses(Request $request){
        $courses = $request->validate([
            'course' => 'array | size: 4 '
        ]);

        $user = Auth::user();
    
        $user->registered_courses()->create(['courses' => json_encode($courses), 'started' => now() ]);
        
        foreach ($courses['course'] as $value) {
            $$value = DB::table($value)->select('id', 'question', 'answer', 'option1', 'option2', 'option3')->inRandomOrder()->get();

            $this->question[$value] = $$value;
        }

        $questions = $this->question;

        return view("startQuiz", compact("user", "questions", "courses"));
    }

}
