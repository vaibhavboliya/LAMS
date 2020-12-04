<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherDashboard extends Controller
{
    public function Dashboard()
    {
        $email = Auth::user()->email;
        $class_data = array();
        $teacher = DB::table('teacher')->select('*')->where('Email','=',$email)->get();
        foreach($teacher as $teach)
        {
            $teacher_id = $teach->teacher_id;
        }
        $teaches = DB::table('teaches')->select('*')->where('teacher_id','=',$teacher_id)->get();
        $i = 0;
        foreach ($teaches as $teach)
        {
            $class = DB::table('class')->select('*')->where('class_id','=',$teach->class_id)->get();
            foreach($class as $c)
            {
                $class_data[$i] = $c->class_name;
            }
            $i++;
        }
        return View('SelectClass')->with('classData',$class_data);
    }
    public function mark(Request $req)
    {
        $email = Auth::user()->email;
        $class_name = $req->class;
        $date = $req->lect_date;
        $time = $req->lect_time;
        $class_id = DB::table('class')->select('class_id')->where('class_name','=',$class_name)->get();
        foreach($class_id as $class)
        {
            $class_id = $class->class_id;
        }
        $teacher_id = DB::table('teacher')->select('teacher_id')->where('Email','=',$email)->get();
        foreach($teacher_id as $teacher)
        {
            $teacher_id = $teacher->teacher_id;
        }
        $subject_id = DB::table('teaches')->select('subject_id')->where('class_id','=',$class_id)->where('teacher_id','=',$teacher_id)->get();
        foreach ($subject_id as $subject)
        {
            $subject_id = $subject->subject_id;
        }
        $teaches_id = DB::table('teaches')->select('teaches_id')->where('class_id','=',$class_id)->where('subject_id','=',$subject_id)->where('teacher_id','=',$teacher_id)->get();
        foreach ($teaches_id as $teaches)
        {
            $teaches_id = $teaches->teaches_id;
        }
        $subject_name = DB::table('subject')->select('subject_name')->where('subject_id','=',$subject_id)->get();
        foreach ($subject_name as $subject)
        {
            $subject_name = $subject->subject_name;
        }
        $students = DB::table('student')->select('*')->where('class_id','=',$class_id)->orderBy('Roll_No','asc')->get();
        $student_f = array();
        $student_l = array();
        $student_r = array();
        $i = 0;
        $count = 0;
        foreach($students as $student)
        {
            $count++;
            $student_f[$i] = $student->First_Name;
            $student_l[$i] = $student->Last_Name;
            $student_r[$i] = $student->Roll_No;
            $i++;
        }
        return View('MarkAttendance')->with('teaches_id',$teaches_id)->with('class_id',$class_id)->with('subject',$subject_name)->with('count',$count)->with('student_r',$student_r)->with('student_l',$student_l)->with('student_f',$student_f)->with('class_name',$class_name)->with('time',$time)->with('date',$date);
    }
    public function submitattendance(Request $req)
    {
        $teaches_id = $req->teaches_id;
        $subject_name = $req->subject;
        $class_name = $req->class_name;
        $class_id = $req->class_id;
        $date = $req->date;
        $time = $req->time;
        $attended = "";
        $count = $req->count;
        for ($i=0;$i<$count;$i++)
        {
            if($req->$i == NULL)
            {
            }
            else
            {

                $attended = $attended.$req->$i.",";
            }
        }
        DB::insert('insert into attends values(?,?,?,?)',array($date,$time,$teaches_id,$attended));
        return redirect()->route('TeacherDashboard');
    }
}
