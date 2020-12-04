<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    //
    public function index()
    {
        $sqlQuery = "SELECT * FROM users";
        $result = DB::select(DB::raw($sqlQuery));
        // return $result;
        return View('userView');
    }

}

