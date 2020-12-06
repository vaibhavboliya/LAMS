<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LeaveController extends Controller
{
    public function leaveapply()
    {
        $email  = Auth::user()->email;
        $student_id = DB::table('student')->select('Enrollment_id')->where('Email','=',$email)->get();
        foreach($student_id as $id)
        {
            $student_id = $id->Enrollment_id;
        }
        $leaveiddata = DB::table('apply')->select('*')->where('enrollment_id','=',$student_id)->get();
        $count = DB::table('apply')->select('*')->where('enrollment_id','=',$student_id)->get()->count();
        $leave_id = array();
        $i = 0;
        foreach ($leaveiddata as $leave)
        {
            $leave_id[$i] = $leave->Lid;
            $i++;
        }
        $start = array();
        $end = array();
        $status = array();
        $i=0;
        foreach ($leave_id as $lid)
        {
            $leavedata = DB::table('leaves')->select('*')->where('lid','=',$lid)->get();
            foreach ($leavedata as $data)
            {
                $start[$i] = $data->start_date;
                $end[$i] = $data->end_date;
                $status[$i] = $data->status;
                $i++;
            }
        }
        return View('leave')->with('start',$start)->with('end',$end)->with('status',$status)->with('count',$count)->with('leave_id',$leave_id);
    }
    public function leaveform()
    {
        return View('leaveform');
    }
    public function leaveformsubmit(Request $request)
    {
        $email  = Auth::user()->email;
        $startdate = $request->startdate;
        $enddate = $request->enddate;
        $reason = $request->reason;
        $proof = $request->proof;
        $class_id = DB::table('student')->select('class_id')->where('Email','=',$email)->get();
        foreach($class_id as $class)
        {
            $class_id = $class->class_id;
        }
        $teacher_id = DB::table('class')->select('teacher_id')->where('class_id','=',$class_id)->get();
        foreach($teacher_id as $teacher)
        {
            $teacher_id = $teacher->teacher_id;
        }
        DB::insert('insert into leaves (reason,start_date,end_date,status,proof,teacher_id) values(?,?,?,?,?,?)',array($reason,$startdate,$enddate,0,$proof,$teacher_id));
        $lid = DB::table('leaves')->select('lid')->where('proof','=',$proof)->get();
        foreach ($lid as $l)
        {
            $lid = $l->lid;
        }
        $student_id = DB::table('student')->select('Enrollment_id')->where('Email','=',$email)->get();
        foreach($student_id as $id)
        {
            $student_id = $id->Enrollment_id;
        }
        DB::insert('insert into apply values(?,?,CURRENT_DATE ,CURRENT_TIME)',array($lid,$student_id));
        return redirect()->route('leaveapply');
    }
    public function deleteleave(Request $request)
    {
        $lid = $request->lid;
        DB::delete('delete from apply where lid = ?',array($lid));
        DB::delete('delete from leaves where lid = ?',array($lid));
        return redirect()->route('leaveapply');
    }
    public function viewleave()
    {
        $email = Auth::user()->email;
        $teacher_id = DB::table('teacher')->select('teacher_id')->where('Email','=',$email)->get();
        foreach ($teacher_id as $teacher)
        {
            $teacher_id = $teacher->teacher_id;
        }
        $leave_applications = DB::table('leaves')->select('*')->where('teacher_id','=',$teacher_id)->get();
        $count = DB::table('leaves')->select('*')->where('teacher_id','=',$teacher_id)->get()->count();
        $start = array();
        $end = array();
        $name = array();
        $lid = array();
        $status = array();
        $i = 0;
        foreach($leave_applications as $application)
        {
            $start[$i] = $application->start_date;
            $end[$i] = $application->end_date;
            $lid[$i] = $application->lid;
            $status[$i] = $application->status;
            $i++;
        }
        $sid = array();
        $i=0;
        foreach ($lid as $l)
        {
            $student_id = DB::table('apply')->select('Enrollment_id')->where('lid','=',$l)->get();
            foreach ($student_id as $id)
            {
                $student_id = $id->Enrollment_id;
                $student_name = DB::table('student')->select('*')->where('Enrollment_id','=',$student_id)->get();
                foreach ($student_name as $n)
                {
                    $student_name = ($n->First_Name)." ".($n->Middle_Name)." ".($n->Last_Name);
                }
                $name[$i] = $student_name;
            }
            $sid[$i] = $student_id;
            $i++;
        }
        //return $name;
        return View('viewLeave')->with('status',$status)->with('sid',$sid)->with('count',$count)->with('name',$name)->with('lid',$lid)->with('start',$start)->with('end',$end);
    }
    public function viewapplication(Request $request)
    {
        $lid = $request->lid;
        $sid = $request->sid;
        $leave = DB::table('leaves')->select('*')->where('lid','=',$lid)->get();
        foreach ($leave as $l)
        {
            $start = $l->start_date;
            $end = $l->end_date;
            $reason = $l->reason;
            $proof = $l->proof;
        }
        $apply = DB::table('apply')->select('*')->where('Lid','=',$lid)->get();
        foreach ($apply as $a)
        {
            $applydate = $a->date_of_Apply;
            $applytime = $a->time_of_apply;
        }
        return View('viewApplication')->with('lid',$lid)->with('applytime',$applytime)->with('applydate',$applydate)->with('start',$start)->with('end',$end)->with('reason',$reason)->with('proof',$proof);
        //return $request;
    }
    public function accept(Request $request)
    {
        DB::update('update leaves set status = 1 where lid = ?',array($request->lid));
        return redirect()->route('viewLeave');
    }
    public function reject(Request $request)
    {
        DB::update('update leaves set status = 2 where lid = ?',array($request->lid));
        return redirect()->route('viewLeave');
    }
}
