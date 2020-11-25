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
})->middleware('preventBackHistory');

Auth::routes();

Route::get('/home', function () {
    switch(\Illuminate\Support\Facades\Auth::user()->is_teacher){
        case '0':
            return redirect(route('home'));
            break;
        case '1':
            return redirect(route('home.teacher'));
            break;
        default:
            return '/login';
            break;
    }
});
//Route::get('/Dashboard',function(){return view('student_registeration');});
Route::get('/home/teacher', [App\Http\Controllers\HomeController::class, 'index'])->name('home.teacher');
Route::get('/home/student', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/StudentRegister',function(){return view('student_registeration');})->name('StudentRegisteration')->middleware('auth')->middleware('preventBackHistory');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
