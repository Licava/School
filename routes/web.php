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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//User Management

Route::get('/User', [App\Http\Controllers\backend\UserController::class, 'alluser'])->name('alluser');

Route::get('/AddUser-index', [App\Http\Controllers\backend\UserController::class, 'AddUser'])->name('AddUser');

Route::post('Insert-user', [App\Http\Controllers\backend\UserController::class, 'InsertUser'])->name('InsertUser');

Route::get('/Edit-User/{id}', [App\Http\Controllers\backend\UserController::class, 'edituser'])->name('edituser');

Route::post('/Update-user/{id}', [App\Http\Controllers\backend\UserController::class, 'UpdateUser'])->name('UpdateUser');

Route::post('Updateprofile', [App\Http\Controllers\backend\UserController::class, 'Updateprofile'])->name('Updateprofile');

Route::get('/delete-user/{id}', [App\Http\Controllers\backend\UserController::class, 'Deleteuser'])->name('DeleteUser');

Route::get('/Scholarship', [App\Http\Controllers\backend\UserController::class, 'Scholarship'])->name('Scholarship');

Route::get('/AddScholarship', [App\Http\Controllers\backend\UserController::class, 'AddScholarship'])->name('AddScholarship');

Route::get('/Profile', [App\Http\Controllers\backend\UserController::class, 'profile'])->name('profile');

Route::get('/Dashboard', [App\Http\Controllers\backend\UserController::class, 'dashboard'])->name('dashboard');

Route::get('/Apply', [App\Http\Controllers\backend\UserController::class, 'Apply'])->name('Apply');