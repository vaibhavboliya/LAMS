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
            return View('student_registeration');
        }
        elseif (Auth::user()->is_teacher == 1) {
            return redirect()->route('TeacherDashboard');
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
            return redirect()->route('logout');
        } elseif (Auth::user()->is_teacher == 1) {
            return redirect()->route('TeacherDashboard');
        }
        else {
            return redirect()->route('home.admin');
        }
}
}
