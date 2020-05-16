<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    protected $courses;
    protected $question;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user  = \Auth::user();
        $this->courses = explode(", " ,auth()->user()->course->courses);
        if ($this->courses) {
            foreach ($this->courses as $value) {
                $table = ucfirst($value);
                $$value = DB::table($value)->select('id', 'question', 'answer', 'option1', 'option2', 'option3')->inRandomOrder()->get();
                $this->question[$value] = $$value;
            }
            $questions = $this->question;
            $courses = $this->courses;
            return view("startQuiz", compact("user", "questions", "courses"));
        } else {
            # code...
            return view('home',compact('user'));
        }
    }
}
