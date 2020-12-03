<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\Session\Session as SessionAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentDashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory');
        $this->middleware('auth');
        $this->middleware('revalidate');
    }
    function attendance()
    {
        $email = Auth::user()->email;
        $student_data = DB::table('student')->select('*')->where('Email','=',$email)->get();
        $student_details = [];
        foreach ($student_data as $data)
        {
            array_push($student_details,$data->Roll_No);
            array_push($student_details,$data->semester);
            array_push($student_details,$data->class_id);
            array_push($student_details,$data->Department);
        }
        $subjects = DB::table('subject')->select('*')->where('semester','=',$student_details[1])->where('Department','=',$student_details[3])->get();
        $sub_id = array();
//        echo $subjects;
        foreach($subjects as $subject)
            array_push($sub_id,$subject->subject_id);
        $i = 0;
        $teaches = array();
        foreach($sub_id as $sub)
        {
            $id = DB::table('teaches')->select('teaches_id')
                ->where('subject_id','=',$sub)
                ->where('class_id','=',$student_details[2])->get();
            foreach($id as $ids)
                foreach($ids as $idds)
                $teaches[$i++] = $idds;
            $i++;
        }
        $attended_lectures = array();
        $i = 0;
        foreach ($teaches as $data)
            {
                $lectures = DB::table('attends')->where('teaches_id','=',$data)->get();
                $attended_lecture = array();
                $attended_lecture["teaches_id"] = $data;
                $total_count = 0;
                $attended_count = 0;
                foreach($lectures as $lect)
                    {
                        $total_count++;
                         $l=$lect->attended_rno;
                         if(strpos($l,(string)$student_details[0]))
                         {
                             $attended_count++;
                         }
                    }
                $attended_lecture["total_count"] = $total_count;
                $attended_lecture["attended_count"] = $attended_count;
                $teacher_id = DB::table('teaches')->select('teacher_id')->where('teaches_id','=',$data)->get();
                foreach ($teacher_id as $tid)
                {
                    $teacher_name = DB::table('teacher')->select('teacher_name')->where('teacher_id','=',$tid->teacher_id)->get();
                    foreach ($teacher_name as $tn)
                        $attended_lecture["faculty_name"] = $tn->teacher_name;
                }
                $teacher_id = DB::table('teaches')->select('teacher_id')->where('teaches_id','=',$data)->get();
                foreach ($teacher_id as $tid)
                {
                    $teacher_email = DB::table('teacher')->select('Email')->where('teacher_id','=',$tid->teacher_id)->get();
                    foreach ($teacher_email as $te)
                        $attended_lecture["faculty_email"] = $te->Email;
                }
                $subject_id = DB::table('teaches')->select('subject_id')->where('teaches_id','=',$data)->get();
                foreach ($subject_id as $sid)
                {
                    $subject_name = DB::table('subject')->select('subject_name')->where('subject_id','=',$sid->subject_id)->get();
                    foreach ($subject_name as $sn)
                        $attended_lecture["subject_name"] = $sn->subject_name;
                }
                $attended_lectures[$i++] = $attended_lecture;

            }
//        foreach($attended_lectures as $value)
//        {
//            echo "total_count " . $value["total_count"];
//            echo "\n";
//            echo "attended_count ".$value["attended_count"];
//            echo "\n";
//            echo "teaches_id " . $value["teaches_id"];
//            echo "\n";
//            echo "teacher_name " . $value["faculty_name"];
//            echo "\n";
//            echo "subject_name " . $value["subject_name"];
//            echo "\n";
//            echo "teacher_Email " . $value["faculty_email"];
//            echo "\n";
//        }
//        echo "\n";
//        echo "\n";
////return $attended_lectures;
    //return $attended_lectures;
        $count_a = 0;
        $count_t = 0;
        foreach ($attended_lectures as $data)
        {
            $count_a = $count_a + $data['attended_count'];
            $count_t = $count_t + $data['total_count'];
        }

    return View('DashboardStudent')->with( ['count_t' => $count_t])->with( ['count_a' => $count_a])->with( ['values' => $attended_lectures])->with( ['count' => count($attended_lectures)]);
    }
}
