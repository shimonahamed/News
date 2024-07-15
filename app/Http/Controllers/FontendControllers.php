<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FontendControllers extends Controller
{
    public function homepage(){
        return view('fontend.homepage');
    }
    public function contact(){
        return view('fontend.contact');
    }
    public function services(){
        return view('fontend.services');
    }
    public function news(){
        return view('fontend.news');
    }


}
