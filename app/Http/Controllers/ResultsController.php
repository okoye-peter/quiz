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
        $data = $request->validate([
            'email' => "required|exists:users"
        ]);
        $user = User::where('email', $request->email)->with('result')->first();
        $results = $user->result ? json_decode($user->result->scores) : null;
        $total  =  $results ? array_sum((array)$results) : '';
        return view('result', compact('user', 'results', 'total'));
    }
}
