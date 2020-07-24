<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view("admin.login");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['min:5', 'required']
        ]);

        if (!Auth::attempt($data)) {
            return redirect('/admin')->withErrors(["msg"=> "Invalid login credentials"]);
        }

        return redirect('/admin/home');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }


    /**
     * Log the user out of the application.
     *r
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/admin');
    }
}