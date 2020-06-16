<?php

namespace App\Http\Controllers;

use App\Result;
use App\User;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function showform(){
        return view('checkResult');
    }

    public function fetchResult(Request $request)
    {
        $user = User::where('email', $request->email)->with('result')->first();
        $results = json_decode($user->result->scores);
        return view('result', compact('user', 'results'));
    }
}
