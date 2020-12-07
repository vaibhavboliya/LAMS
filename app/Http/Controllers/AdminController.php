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
        if(Auth::user()->is_teacher == 2)
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
        return View('admin.admin')->with('id',$user_id)->with('name',$user_name)->with('email',$user_email)->with('role',$user_role);
//        $sqlQuery = "SELECT * FROM users";
//        $result = DB::select(DB::raw($sqlQuery));
//        // return $result;
//        return View('userView');
    }
        elseif (Auth::user()->is_teacher == 1)
        {
            return redirect()->route('TeacherDashboard');
        }
        else
        {
            return redirect()->route('Dashboard');
        }
    }
    public function viewuser(Request $request)
    {
        if(Auth::user()->is_teacher == 1)
        {
        $id = $request->route('email');
        $sqlQuery = "SELECT * FROM users where id=$id";
        $result = DB::select(DB::raw($sqlQuery));
        $i = 0;
        foreach ( $result as $user ) {
            $user_id = $user->id;
            $user_name = $user->name;
            $user_email = $user->email;
            $user_role = $user->is_teacher;
            $i++;
        }
        // $user_data = DB::table('users')->select($id)->get();
        // return $result;
        return View('admin.userView')->with('id', $user_id)->with('name', $user_name)->with('email', $user_email)->with('role', $user_role);
    }
    elseif (Auth::user()->is_teacher == 1)
        {
            return redirect()->route('TeacherDashboard');
        }
        else
        {
            return redirect()->route('Dashboard');
        }

    }
    public function edituser(Request $request)
    {
        if(Auth::user()->is_teacher == 1)
        {
        $email = $request->email;
        $name = $request->name;
        $role = $request->role;
        DB::update('update users set is_teacher = ? , name = ? where email = ?',array($role,$name,$email));
        return redirect()->route('home.admin');
        }
        elseif (Auth::user()->is_teacher == 1)
        {
            return redirect()->route('TeacherDashboard');
        }
        else
        {
            return redirect()->route('Dashboard');
        }

    }
    public function deleteuser(Request $request)
    {
        if(Auth::user()->is_teacher == 2)
        {
        $id = $request->route('id');
        $sqlQuery = "delete FROM users where id= ?";
        DB::delete($sqlQuery,array($id));
        return redirect()->route('home.admin');
        }
        elseif (Auth::user()->is_teacher == 1)
        {
            return redirect()->route('TeacherDashboard');
        }
        else
        {
            return redirect()->route('Dashboard');
        }
    }
    public function class(){
        return View('admin.adminclass');
    }
    public function subject(){
        return View('admin.adminsubject');
    }
    public function teacher(){
        return View('admin.adminteacher');
    }
    public function teaches(){
        return View('admin.adminteaches');
    }
    public function student(){
        return View('admin.adminstudent');
    }

}

