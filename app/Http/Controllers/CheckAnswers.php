<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Result;
use Illuminate\Support\Facades\DB;

class CheckAnswers extends Controller
{
    public function score(Request $request){
        $user = auth()->user();
        $result = [];
        $courses = json_decode($user->registered_courses->courses);
        $choices = collect($request->all())->flatten(1)->toArray();
        foreach ($courses->course as $index =>$course) {
            $result[$course] = 0;
            $answers = Course::where('course', $course)->with('questions')->first()->questions->pluck('answer');
            foreach ($answers as $index => $answer) {
                if (array_search($answer, $choices)){
                    $result[$course]++;
                }
            }
        }

        $result = json_encode($result);
        DB::transaction(function() use ($user, $result){
            $user->result()->create([
                'user_id' => $user->id,
                'scores' => $result
            ]);
    
            $user->registered_courses()->update([
                'completed' => true,
                'updated_at' => now()
            ]);
        });

        return redirect('/user/quiz');
    }
}
