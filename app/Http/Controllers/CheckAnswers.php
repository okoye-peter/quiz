<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Result;

class CheckAnswers extends Controller
{
    public function score(Request $request){
        $user = auth()->user()->with('course')->first();
        $result = [];
        $courses = explode(', ', $user->course->courses);
        $choices = collect($request->all())->flatten(1)->toArray();
        foreach ($courses as $index =>$course) {
            $result[$course] = 0;
            $answers = DB::table($course)->pluck('answer');
            foreach ($answers as $index => $answer) {
                if (array_search($answer, $choices)){
                    $result[$course]++;
                }
            }
        }
        $result = json_encode($result);

        Result::create([
            'user_id' => auth()->user()->id,
            'scores' => $result
        ]);
        return view('finish', compact($user));
    }
}
