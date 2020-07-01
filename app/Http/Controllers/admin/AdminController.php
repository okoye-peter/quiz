<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Http\Request;
use App\User;
use App\Course;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.routes');
    }


    public function index()
    {
        $users = User::where('isadmin', false)->with('registered_courses', 'result')->get();
        return view('admin.dashboard', compact('users'));
    }

    public function userProfile(User $user)
    {
        $courses = Course::orderBy('course', 'ASC')->get();
        $registered_courses = $user->registered_courses ?  json_decode($user->registered_courses->courses) : 'not yet registered';
        $id = $user->registered_courses ?  $user->registered_courses->id : '';
        $result = $user->result ? json_decode($user->result->scores) : 'not available';
        return view('admin.user_profile', compact('user', 'result', 'courses', 'registered_courses', 'id'));
    }

    public function userProfileUpdate(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'birth' => 'rquired|date',
            'nationality' => 'required|string',
            'gender' => 'required|string|max:1',
            'email' => 'required|email|string',
            'address' => 'rquired|string',
            'city' => 'required|string',
            'image' => 'required|image|max:2500'
        ]);

        $name = $_FILES['avatar']['tmp_name'];
        // upload image to cloud
        Cloudder::upload($name, null);
        // get the url of the image
        $image_url = Cloudder::show(Cloudder::getPublicId(), ["width" => 150, "height" => 150]);

        $data['image'] = $image_url;

        if ($user->update($data)) {
            return back()->with('success', "$request->name credentials updated successfully");
        }

        return back()->withErrors(['failed' => "sorry something went wrong"]);
    }

    public function courseUpdate(Course $course, Request $request)
    {
        $data = json_encode($request->validate([
            'course' => 'array | size: 4 | rquired'
        ]));

        if ($course->update(['courses' => $data])) {
            return back()->with('success', "Courses updated successfully");
        }

        return back()->withErrors(['failed' => "sorry something went wrong"]);
    }
}
