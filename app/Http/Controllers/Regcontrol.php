<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class Regcontrol extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
        $this->middleware('revalidate');
    }
    public function regshow()
    {
        if (Auth::user()->is_teacher == 0 && Auth::user()->is_registered == 0)
        {
            $class_name = array();
            $i = 0;
            $class = DB::table('class')->select('class_name')->get();
            foreach ($class as $c)
            {
                $class_name[$i] = $c->class_name;
                $i++;
            }
            return View('student_registeration')->with('class_name',$class_name)->with('count',$i);
        }
        elseif (Auth::user()->is_teacher == 1) {
            return redirect()->route('TeacherDashboard');
        }
        else {
            return redirect()->route('home.admin');
        }

    }
    public function teacherreg()
    {
        if (Auth::user()->is_teacher == 1 && Auth::user()->is_registered == 0)
        {
            return View('admin.teacher_registeration');
        }
        elseif (Auth::user()->is_teacher == 1 && Auth::user()->is_registered == 1)
        {
            return redirect('TeacherDashboard');
        }
        elseif (Auth::user()->is_teacher == 0) {
            return redirect()->route('Dashboard');
        }
        else {
            return redirect()->route('home.admin');
        }
    }
    public function insertteacher(Request $request)
    {
        if (Auth::user()->is_teacher == 1 && Auth::user()->is_registered == 0)
        {
            $phone_number = $request->PhoneNumber;
            DB::insert('insert into teacher (teacher_name,Email,Phone_No_1) value(?,?,?)',array(Auth::user()->name,Auth::user()->email,$phone_number));
            DB::update('update users set is_registered = 1 where email = ?',array(Auth::user()->email));
            return redirect()->route('TeacherDashboard');
        }
        elseif (Auth::user()->is_teacher == 1 && Auth::user()->is_registered == 1)
        {
            return redirect('TeacherDashboard');
        }
        elseif (Auth::user()->is_teacher == 0) {
            return redirect()->route('Dashboard');
        }
        else {
            return redirect()->route('home.admin');
        }
    }

    public function reg(Request $req)
    {
        if (Auth::user()->is_teacher == 0 && Auth::user()->is_registered == 0)
        {
            $enrollmentNumber = $req->EnrollmentNumber;
            $firstName = $req->firstName;
            $middleName = $req->middleName;
            $lastName = $req->lastName;
            $email1 = Auth::user()->email;
            $email2 = $req->email2;
            $studentPhone = $req->studentPhone;
            $parentPhone = $req->parentPhone;
            $className = $req->className;
            $rollNo = $req->rollNo;
            $semester = $req->semester;
            $dept = $req->department;
            $class_id = DB::table('class')->select('class_id')->where('class_name', '=', $className)->get();
            foreach ( $class_id as $class )
                $class_id = $class->class_id;
            DB::insert('insert into student values(?,?,?,?,?,?,?,?,?,?,?)', array($enrollmentNumber, $rollNo, $firstName, $middleName, $lastName, $email1, $studentPhone, $parentPhone, $semester, $dept, $class_id));
            DB::update('update users set is_registered = 1 where email = ?',array(Auth::user()->email));
            return redirect()->route('logout');
        } elseif (Auth::user()->is_teacher == 1) {
            return redirect()->route('TeacherDashboard');
        }
        else {
            return redirect()->route('home.admin');
        }
}
}
