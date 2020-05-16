<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckAnswers extends Controller
{
    public function score(Request $request){
        dd($request->request);
    }
}
