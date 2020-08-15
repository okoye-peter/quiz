<?php

namespace App\Http\Controllers\Auth;

use App\User;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
// use App\Events\NewUserEmailVerificationEvent;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'avatar' => ['required', 'file', 'image', 'max: 5000' ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'birth' => ['required', 'date'],
            'nationality' => ['required', 'string'],
            'gender' => ['required', 'string','max:1'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $this->validator($data);
        // save the image
        // request()->avatar->store('uploads/','public');
        $name = $_FILES['avatar']['tmp_name'];
        // upload image to cloud
        Cloudder::upload($name, null);
        // get the url of the image
         $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => 150, "height"=> 150]);
         
        // resize the image
        $user =  User::create([
            'name' => $data['name'],
            'image' => $image_url,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'birth' => $data['birth'],
            'address' => $data['address'],
            'city' => $data['city'],
            'nationality' => $data['nationality'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
            'verification_code' => sha1(time())
        ]); 
        // if ($user != null) {
        //     // send email
        //     event(new NewUserEmailVerificationEvent($user));
        //     // redirect with message
        //     return back()->with('success', 'please check your email from verification mail');
        // }       
        // return back()->withErrors(['error'=>'sorry something went wrong']);
    }


    // public function emailVerify(Request $request)
    // {
    //     $verification_code = $request->code;
    //     $user = User::where('verification_code', $verification_code)->first();
    //     if ($user) {
    //         # code...
    //         $user->is_verified = 1;
    //         $user->save();
    //         return redirect('/login')->with('success', 'email verified successfully you can now login');
    //     }
    //     return redirect('/login')->withErrors(['error' => 'Invalid verification code']);
    // }
    
}
