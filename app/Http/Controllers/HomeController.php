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
        $email = Auth::user()->email;
        $count = DB::table('student')->where('Email','=',$email)->get()->count();
        if ($count == 0)
        {
            //return view('student_registeration');
            return redirect()->route('StudentRegisteration');
        }
        else
        {
            return redirect()->route('welcome');
        }
    }
}
