<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function registerCourses(Request $request){
        $courses = $request->validate([
            'course' => 'array | size: 4 | required'
        ]);

        $user = Auth::user();
        $user->registered_courses()->create(['courses' => json_encode($courses)]);
        
        return redirect('/user/quiz/details');
    }

}
