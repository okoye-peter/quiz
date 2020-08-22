<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactUsController extends Controller
{
    public function showform()
    {
        return view('contact');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'message' => 'required|string'
        ]);

        $data['name'] = $data['firstname'] ." " . $data['lastname'];

        DB::insert('insert into issues(name,email,phone,message,created_at,updated_at) values(?,?,?,?,?,?)', [$data['name'], $data['email'], $data['phone'], $data['message'], Carbon::now(), Carbon::now()]);
        return back()->with('success', 'thank you for you message, we will be in touch');
    }
}
