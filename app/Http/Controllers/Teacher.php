<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Teacher extends Controller
{
    function index()
    {
        if (Auth::user()->is_teacher == 1) {
            return redirect(route('TeacherDashboard'));
        }
        elseif (Auth::user()->is_teacher == 0)
        {
            return redirect()->route('Dashboard');
        }
        else
        {
            return redirect()->route('home.admin');
        }
    }
}
