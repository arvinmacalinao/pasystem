<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return redirect('/login');
});

Route::middleware(['guest'])->group(function() {
    /************************ START OF AUTHENTICATION ROUTES ************************/
    /* Login and Logout Routes */
    Route::any('login', [LoginController::class, 'loginform'])->name('users.loginform');
    Route::post('loginuser', [LoginController::class, 'login'])->name('users.login');
    Route::post('register', [LoginController::class, 'register'])->name('users.register');
    Route::get('user-register', [LoginController::class, 'registerform'])->name('users.registerform');
    /************************ END OF AUTHENTICATION ROUTES ************************/
});

Route::group(['middleware' => 'auth'], function () {
    Route::any('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');


    // EMPLOYEE RECORD
    Route::get('employees', [UserController::class, 'index'])->name('employee.index');
    Route::get('employee/add', [UserController::class, 'create'])->name('employee.add');
    Route::post('employee/store/{id}', [UserController::class, 'store'])->name('employee.store');
    Route::get('employee/edit/{id}', [UserController::class, 'edit'])->name('employee.edit');
    Route::get('employee/delete/{id}', [UserController::class, 'destroy'])->name('employee.delete');

    //Team
    Route::get('my-team', [TeamController::class, 'index'])->name('team.index');
    Route::get('/rate/{id}', [TeamController::class, 'rate'])->name('team.rate');

    Route::post('my-team/appraise/{id}', [TeamController::class, 'appraise'])->name('team.appraise');

    Route::controller(CompanyController::class)->group(function () {
		Route::get('company', 'index')->name('company.index');
		Route::get('company/form', 'form')->name('company.add');
		Route::get('company/edit/{id?}', 'edit')->name('company.edit');
		Route::post('company/save/{id?}', 'save')->name('company.save');
		Route::delete('company/delete/{id?}', 'delete')->name('company.delete');
	});
    
});


