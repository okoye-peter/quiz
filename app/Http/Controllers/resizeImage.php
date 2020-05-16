<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class resizeImage extends Controller
{
    //

    public function resize(){
        \request()->pic->store('back', "public");
        $image = Image::make(public_path('storage/'. request()->pic->store('back', "public") ))->fit(37000, 1000);
        $image->save();
        dd(request()->pic->store('back', "public"));
    }
}
