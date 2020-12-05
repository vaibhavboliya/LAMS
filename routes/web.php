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

// ====================================teacher routes===================================
route::get('/TeacherDashboard',[\App\Http\Controllers\TeacherDashboard::class,'Dashboard'])->name('TeacherDashboard');
route::post('/TeacherDashboard',[\App\Http\Controllers\TeacherDashboard::class,'mark'])->name('mark');
Route::post('/submitattendance',[\App\Http\Controllers\TeacherDashboard::class,'submitattendance'])->name('submitattendance');
Route::get('/home/teacher', [App\Http\Controllers\Teacher::class, 'index'])->name('home.teacher')->middleware('verified');

// ====================================Admin routes===================================
Route::get('/home/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('home.admin')->middleware('verified');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout')->middleware('revalidate');;

