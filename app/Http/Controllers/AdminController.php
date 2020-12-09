<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    // User Admin Controller
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
        if(Auth::user()->is_teacher == 2)
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
        if(Auth::user()->is_teacher == 2)
        {
        $email = $request->email;
        $name = $request->name;
        $role = $request->role;
        DB::update('update users set is_teacher = ? , name = ?  where email = ?',array($role,$name,$email));
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

    // Subject Admin Controller
    public function subject(){
        if(Auth::user()->is_teacher == 2) {

            $data = DB::table('subject')->select('*')->get();
            $subject_id = array();
            $subject_name = array();
            $year = array();
            $department = array();
            $semester = array();
            $i = 0;
            foreach($data as $d)
            {
                $subject_id[$i] = $d->subject_id;
                $subject_name[$i] = $d->subject_name;
                $year[$i] = $d->year;
                $department[$i] = $d->Department;
                $semester[$i] = $d->semester;
                $i++;
            }
            return View('admin.adminsubject')
                ->with('subject_id',$subject_id)
                ->with('subject_name',$subject_name)->with('year',$year)
                ->with('department',$department)->with('semester',$semester)
                ->with('count',$i);
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
    public function deletesubject(Request $request)
    {
        if(Auth::user()->is_teacher == 2) {
            $subject_id = $request->subject_id;
            DB::delete('delete from subject where subject_id = ?', array($subject_id));
            return redirect()->route('admin.subject');
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
    public function addsubject()
    {
        if(Auth::user()->is_teacher == 2) {
            return View('admin.addsubject');
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
    public function insertsubject(Request $request)
    {
        if(Auth::user()->is_teacher == 2) {
        $name = $request->name;
        $year = $request->year;
        $dept = $request->Department;
        $semester = $request->semester;
        DB::insert('insert into subject (subject_name,year,Department,semester) values(?,?,?,?)',array($name,$year,$dept,$semester));
        return redirect()->route('admin.subject');
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
    public function updatesubject(Request $request)
    {
        if(Auth::user()->is_teacher == 2) {
        $subject_id = $request->subject_id;
        $data = DB::table('subject')->select('*')->where('subject_id', '=', $subject_id)->get();
        foreach ( $data as $d ) {
            $name = $d->subject_name;
            $year = $d->year;
            $department = $d->Department;
            $semester = $d->semester;
        }
        return View('admin.updates')->with('subject_id', $subject_id)
            ->with('name', $name)->with('year', $year)
            ->with('department', $department)->with('semester', $semester);
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
    public function updatetablesubject(Request $request)
    {
        if(Auth::user()->is_teacher == 2) {
        $subject_id = $request->subject_id;
        $name = $request->subject_name;
        $year = $request->year;
        $dept = $request->Department;
        $semester = $request->semester;
        DB::update('update subject set subject_name=?,year=?,Department=?,semester=? where subject_id=?',array($name,$year,$dept,$semester,$subject_id));
        return redirect()->route('admin.subject');
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

//    Class Admin Controller
    public function class(){
        if(Auth::user()->is_teacher == 2) {
            $class_id = array();
            $class_name = array();
            $capacity = array();
            $year = array();
            $teacher_id = array();
            $i = 0;
            $data = DB::table('class')->select('*')->get();
            $count = 0;
            foreach ( $data as $d ) {
                $count++;
                $class_id[$i] = $d->class_id;
                $class_name[$i] = $d->class_name;
                $capacity[$i] = $d->capacity;
                $year[$i] = $d->year;
                $teacher_id[$i] = $d->teacher_id;
                $i++;
            }

            return View('admin.adminclass')->with('count',$count)
                ->with('class_id',$class_id)->with('year',$year)->with('teacher_id',$teacher_id)
                ->with('class_name',$class_name)->with('capacity',$capacity);
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
    public function addclass(){
        if(Auth::user()->is_teacher == 2) {
            $teacher_id = DB::table('teacher')->select('*')->get();
            $id = array();
            $name = array();
            $i = 0;
            foreach ($teacher_id as $d)
            {
                $id[$i] = $d->teacher_id;
                $name[$i] = $d->teacher_name;
                $i++;
            }
            return View('admin.addclass')->with('id',$id)->with('name',$name)->with('count',$i);
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
    public function deleteclass(Request $request)
    {
        if(Auth::user()->is_teacher == 2) {
            $class_id = $request->class_id;
            DB::delete('delete from class where class_id = ?',array($class_id));
            return redirect()->route('admin.class');
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
    public function updateclass(Request $request)
    {
        if(Auth::user()->is_teacher == 2) {
            $class_id = $request->class_id;
            $teacher_id = DB::table('teacher')->select('*')->get();
            $id = array();
            $name = array();
            $i = 0;
            foreach ($teacher_id as $d)
            {
                $id[$i] = $d->teacher_id;
                $name[$i] = $d->teacher_name;
                $i++;
            }
            $data = DB::table('class')->select('*')->where('class_id','=',$class_id)->get();
            foreach ($data as $d)
            {
                $capacity = $d->capacity;
                $year = $d->year;
                $teacher_id = $d->teacher_id;
                $class_name = $d->class_name;
            }
            return View('admin.updateclass')->with('count',$i)->with('capacity',$capacity)
                ->with('year',$year)
                ->with('teacher_id',$teacher_id)
                ->with('class_name',$class_name)->with('class_id',$class_id)->with('id',$id)->with('name',$name);
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
    public function insertclass(Request $request)
    {
        if(Auth::user()->is_teacher == 2) {
        $class_name = $request->name;
        $year = $request->year;
        $teacher_id = $request->teacher_id;
        $capacity = $request->capacity;
        DB::insert('insert into class (class_name,capacity,year,teacher_id) values(?,?,?,?)',array($class_name,$capacity,$year,$teacher_id));
        return redirect()->route('admin.class');
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
    public function updatetableclass(Request $request)
    {
        if(Auth::user()->is_teacher == 2) {
            DB::update('update class set class_name = ? , year = ? , capacity = ? ,teacher_id = ? where class_id = ?', array(
                $request->name, $request->year, $request->capacity, $request->teacher_id, $request->class_id));
            return redirect()->route('admin.class');
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


//    Teaches Admin Controller
public function teaches()
{
    if(Auth::user()->is_teacher == 2) {
        $teaches_id = array();
        $teacher_id = array();
        $teacher_name = array();
        $subject_id = array();
        $subject_name = array();
        $class_id = array();
        $class_name = array();
        $i = 0;
        $data = DB::table('teaches')->select('*')->get();
        foreach ( $data as $d ) {
            $teaches_id[$i] = $d->teaches_id;
            $teacher_id[$i] = $d->teacher_id;
            $tdata = DB::table('teacher')->select('teacher_name')->where('teacher_id', '=', $d->teacher_id)->get();
            foreach ( $tdata as $td ) {
                $teacher_name[$i] = $td->teacher_name;
            }
            $subject_id[$i] = $d->subject_id;
            $sdata = DB::table('subject')->select('subject_name')->where('subject_id', '=', $d->subject_id)->get();
            foreach ( $sdata as $sd ) {
                $subject_name[$i] = $sd->subject_name;
            }
            $class_id[$i] = $d->class_id;
            $cdata = DB::table('class')->select('class_name')->where('class_id', '=', $d->class_id)->get();
            foreach ( $cdata as $cd ) {
                $class_name[$i] = $cd->class_name;
            }
            $i++;
        }
        return View('admin.adminteaches')->with('teacher_name',$teacher_name)
            ->with('class_name',$class_name)
            ->with('subject_name',$subject_name)
            ->with('teaches_id',$teaches_id)->with('class_id',$class_id)->with('count',$i)
            ->with('teacher_id',$teacher_id)->with('subject_id',$subject_id);
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
public function deleteteaches(Request $request)
{
    if(Auth::user()->is_teacher == 2) {
    $teaches_id = $request->teaches_id;
    DB::delete('delete from attends where teaches_id = ?',array($teaches_id));
    Db::delete('delete from teaches where teaches_id = ?',array($teaches_id));
    return redirect()->route('admin.teaches');
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
public function addteaches()
{
    if(Auth::user()->is_teacher == 2) {
    $class_id = array();
    $class_name = array();
    $data = DB::table('class')->select('*')->get();
    $i=0;
    foreach($data as $d)
    {
        $class_name[$i] = $d->class_name;
        $class_id[$i] = $d->class_id;
        $i++;
    }
    return View('admin.addteaches')->with('class_name',$class_name)->with('class_id',$class_id)->with('count',$i);
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
public function teachessubject(Request $request)
{
    if(Auth::user()->is_teacher == 2) {
    $subject_id = array();
    $subject_name = array();
    $i = 0;
    $class_id = $request->class_id;
    $data = DB::table('teaches')->select('subject_id')->where('class_id','=',$class_id)->get();
    foreach ($data as $d)
    {
        $subject_id[$i] = $d->subject_id;
        $i++;
    }
    $year = DB::table('class')->select('year')->where('class_id','=',$class_id)->get();
    foreach($year as $y)
    {
        $year = $y->year;
    }
    $data = DB::table('subject')->select('*')->where('year','=',$year)->whereNotIn('subject_id',$subject_id)->get();
    $subject_id = array();
    $i = 0;
    foreach ($data as $d)
    {
        $subject_id[$i] = $d->subject_id;
        $subject_name[$i] = $d->subject_name;
        $i++;
    }
    return view('admin.selectsubject')->with('count',$i)->with('class_id',$class_id)
        ->with('subject_id',$subject_id)->with('subject_name',$subject_name);

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
public function teachesteacher(Request $request)
{
    if(Auth::user()->is_teacher == 2) {
    $teacher_id = array();
    $teacher_name = array();
    $class_id = $request->class_id;
    $subject_id = $request->subject_id;
    $already_id = array();
    $already = DB::table('teaches')->select('teacher_id')->where('class_id','=',$class_id)->get();
    $i = 0;
    foreach ($already as $a)
    {
        $already_id[$i] = $a->teacher_id;
        $i++;
    }
    $data = DB::table('teacher')->select('*')->whereNotIn('teacher_id',$already_id)->get();
    $i = 0;
    foreach ($data as $d)
    {
        $teacher_id[$i] = $d->teacher_id;
        $teacher_name[$i] = $d->teacher_name;
        $i++;
    }
    return View('admin.selectteacher')->with('count',$i)->with('class_id',$class_id)->with('subject_id',$subject_id)
        ->with('teacher_id',$teacher_id)->with('teacher_name',$teacher_name);
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
public function teachesinsert(Request $request)
{
    if(Auth::user()->is_teacher == 2) {
    $teacher_id = $request->teacher_id;
    $subject_id = $request->subject_id;
    $class_id = $request->class_id;
    DB::insert('insert into teaches (teacher_id,subject_id,class_id,roll_no_allowed) values(?,?,?,?)',array($teacher_id,$subject_id,$class_id,"_"));
    return redirect()->route('admin.teaches');
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
}


