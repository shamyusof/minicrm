<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

//Auth::routes();
Auth::routes([

    'register' => false, // Register Routes... 
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...
  
  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/company', \App\Http\Controllers\CompanyController::class);
Route::resource('/employee', \App\Http\Controllers\EmployeeController::class);

