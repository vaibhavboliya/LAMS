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
        $user_data = DB::table('users')->select('*')->get();
        $user_id = array();
        $user_name = array();
        $user_email = array();
        $user_role = array();
        $i = 0;
        foreach ($user_data as $user)
        {
            $user_id[$i] = $user->id;
            $user_name[$i] = $user->name;
            $user_email[$i] = $user->email;
            $user_role[$i] = $user->is_teacher;
            $i++;
        }
        return View('admin')->with('id',$user_id)->with('name',$user_name)->with('email',$user_email)->with('role',$user_role);
//        $sqlQuery = "SELECT * FROM users";
//        $result = DB::select(DB::raw($sqlQuery));
//        // return $result;
//        return View('userView');
    }
    public function viewuser(Request $request) {
        $id = $request->route('email');
        $sqlQuery = "SELECT * FROM users where id=$id";
        $result = DB::select(DB::raw($sqlQuery));
        $i = 0;
        foreach ($result as $user)
        {
            $user_id = $user->id;
            $user_name = $user->name;
            $user_email = $user->email;
            $user_role = $user->is_teacher;
            $i++;
        }
        // $user_data = DB::table('users')->select($id)->get();
        // return $result;
        return View('userView')->with('id',$user_id)->with('name',$user_name)->with('email',$user_email)->with('role',$user_role);


    }
    public function edituser(Request $request)
    {
        return $request;

    }

}

