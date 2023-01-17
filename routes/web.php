<?php

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
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth','verified']);

//User Management

Route::get('/User', [App\Http\Controllers\backend\UserController::class, 'alluser'])->name('alluser');

Route::get('/AddUser-index', [App\Http\Controllers\backend\UserController::class, 'AddUser'])->name('AddUser');

Route::post('Insert-user', [App\Http\Controllers\backend\UserController::class, 'InsertUser'])->name('InsertUser');

Route::get('/Edit-User/{id}', [App\Http\Controllers\backend\UserController::class, 'edituser'])->name('edituser');

Route::post('/Update-user/{id}', [App\Http\Controllers\backend\UserController::class, 'UpdateUser'])->name('UpdateUser');

Route::post('Updateprofile', [App\Http\Controllers\backend\UserController::class, 'Updateprofile'])->name('Updateprofile');

Route::get('/delete-user/{id}', [App\Http\Controllers\backend\UserController::class, 'Deleteuser'])->name('DeleteUser');


Route::post('/p', [App\Http\Controllers\ScholarshipController::class, 'Store'])->name('Store');

Route::get('/Scholarship', [App\Http\Controllers\ScholarshipController::class, 'Scholarship'])->name('Scholarship');

Route::get('/Scholarship/{id}', [App\Http\Controllers\ScholarshipController::class, 'editscholarship'])->name('editscholarship');

Route::post('/Update-Scholarship/{id}', [App\Http\Controllers\ScholarshipController::class, 'UpdateScholarship'])->name('UpdateScholarship');

Route::get('/delete-scholarship/{id}', [App\Http\Controllers\ScholarshipController::class, 'Deletescholarship'])->name('Deletescholarship');

Route::get('/AddScholarship', [App\Http\Controllers\ScholarshipController::class, 'AddScholarship'])->name('AddScholarship');


Route::post('/applying/{id}', [App\Http\Controllers\StudentController::class, 'applying'])->name('applying');

Route::get('/Apply/{id}', [App\Http\Controllers\StudentController::class, 'Apply'])->name('Apply');

Route::get('/Applicants/{id}', [App\Http\Controllers\StudentController::class, 'Applicants'])->name('Applicants');


Route::get('/Approve/{id}', [App\Http\Controllers\StudentController::class, 'Approve'])->name('Approve');

Route::get('/Profile', [App\Http\Controllers\backend\UserController::class, 'profile'])->name('profile');

Route::get('/Changepassword', [App\Http\Controllers\backend\UserController::class, 'Changepassword'])->name('Changepassword');

Route::get('/Dashboard', [App\Http\Controllers\backend\UserController::class, 'dashboard'])->name('dashboard');




Route::post('/Updatepassword', [App\Http\Controllers\backend\UserController::class, 'Updatepassword'])->name('Updatepassword');