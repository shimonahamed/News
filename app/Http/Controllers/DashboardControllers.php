<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardControllers extends Controller
{
    public function dashboard(){
        return view('backend.dashboard');
    }
    public function dashboard1(){
        return view('backend.dashboard1');
    }
    public function dashboardtwo(){
        return view('backend.dashboardtwo');
    }
}
