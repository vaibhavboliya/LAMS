<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        DB::insert('insert into leaves (reason,start_date,end_date,status,proof) values(?,?,?,?,?)',array($reason,$startdate,$enddate,0,$proof));
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
}
