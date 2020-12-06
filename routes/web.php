<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/home', function () {
    switch(\Illuminate\Support\Facades\Auth::user()->is_teacher){
        case '0':
            return redirect(route('home'));
            break;
        case '1':
            return redirect(route('home.teacher'));
            break;
        case '2':
            return redirect(route('home.admin'));
            break;
        default:
            return '/login';
            break;
    }
});

// =============================================student routes=================================
Route::get('/home/student', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/StudentRegister',function(){return view('student_registeration');})->name('StudentRegisteration')->middleware('auth')->middleware('revalidate');;
Route::post('/status','App\Http\Controllers\Regcontrol@reg')->middleware('auth')->middleware('revalidate');;
Route::get('/Dashboard','App\Http\Controllers\StudentDashboard@attendance')->name('Dashboard')->middleware('auth')->middleware('revalidate');;
Route::get('/profile','App\Http\Controllers\StudentDashboard@profile')->name('profile')->middleware('auth')->middleware('revalidate');;
Route::get('/leaveapply','App\Http\Controllers\LeaveController@leaveapply')->name('leaveapply')->middleware('auth')->middleware('revalidate');;
Route::get('/leaveform','App\Http\Controllers\LeaveController@leaveform')->name('leaveform')->middleware('auth')->middleware('revalidate');;
Route::post('/leaveformsubmit','App\Http\Controllers\LeaveController@leaveformsubmit')->name('leaveformsubmit')->middleware('auth')->middleware('revalidate');;
Route::post('/deleteleave','App\Http\Controllers\LeaveController@deleteleave')->name('deleteleave')->middleware('auth')->middleware('revalidate');;
// ====================================teacher routes===================================
route::get('/TeacherDashboard',[\App\Http\Controllers\TeacherDashboard::class,'Dashboard'])->name('TeacherDashboard');
route::post('/TeacherDashboard',[\App\Http\Controllers\TeacherDashboard::class,'mark'])->name('mark');
Route::post('/submitattendance',[\App\Http\Controllers\TeacherDashboard::class,'submitattendance'])->name('submitattendance');
Route::get('/home/teacher', [App\Http\Controllers\Teacher::class, 'index'])->name('home.teacher')->middleware('verified');
Route::get('/viewLeave','App\Http\Controllers\LeaveController@viewleave')->name('viewLeave')->middleware('verified');
Route::post('/viewapplication','App\Http\Controllers\LeaveController@viewapplication')->name('viewApplication')->middleware('verified');
Route::post('/accept','App\Http\Controllers\LeaveController@accept')->name('accept')->middleware('verified');
Route::post('/reject','App\Http\Controllers\LeaveController@reject')->name('reject')->middleware('verified');
// ====================================Admin routes===================================
Route::get('/home/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home.admin')->middleware('verified');
Route::get('/admin/user/{email}', [App\Http\Controllers\AdminController::class, 'viewuser'])->name('admin.viewuser')->middleware('verified');
Route::post('/admin/user/update', [App\Http\Controllers\AdminController::class, 'edituser'])->name('edituser')->middleware('verified');
Route::get('/admin/user/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteuser'])->name('deleteuser')->middleware('verified');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout')->middleware('revalidate');;

