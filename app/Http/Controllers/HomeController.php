<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
        $this->middleware('revalidate');
    }

    /**
     * Show the application dashboard.
     *
     * @return string
     */
    public function index()
    {
        if(Auth::user()->is_teacher == 0)
        {
            if (Auth::user()->is_registered == 0) {
                return redirect()->route('StudentRegisteration');
            } else {
                return redirect()->route('welcome');
            }
        }
        elseif (Auth::user()->is_teacher == 1)
        {
            return redirect()->route('TeacherDashboard');
        }
        else
        {
            return redirect()->route('home.admin');
        }
    }
}
