<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Teacher extends Controller
{
    function index()
    {
        return redirect(route('TeacherDashboard'));
    }
}
