<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HRAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserGroupsController;
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

    //Team
    Route::get('my-team', [TeamController::class, 'index'])->name('team.index');
    Route::get('/rate/{id}', [TeamController::class, 'rate'])->name('team.rate');
    Route::post('my-team/{id}appraise/{appraise_id}', [TeamController::class, 'appraise'])->name('team.appraise');
    Route::get('/team/copy-rating/{id}', [TeamController::class, 'copyRating'])->name('team.copy.rating');
    Route::get('/team/view/{id}', [TeamController::class, 'view'])->name('team.view');
    
});

// EMPLOYEE RECORD
    Route::middleware(['role:HR Admin|Superadmin'])->group(function () {
    Route::get('employees', [UserController::class, 'index'])->name('employee.index');
    Route::get('employee/add', [UserController::class, 'create'])->name('employee.add');
    Route::post('employee/store/{id}', [UserController::class, 'store'])->name('employee.store');
    Route::get('employee/edit/{id}', [UserController::class, 'edit'])->name('employee.edit');
    Route::get('employee/delete/{id}', [UserController::class, 'destroy'])->name('employee.delete');

    // Fill up Attendance
    Route::get('hr-attendance', [HRAdminController::class, 'index'])->name('hr.attendance.index');
    Route::get('hr-attendance/{id}/rate/', [HRAdminController::class, 'rate'])->name('hr.attendance.rate');
    Route::post('hr-attendance/{id}/attendance/{attendance_id}', [HRAdminController::class, 'store'])->name('hr.attendance.store');
    
    // Team
    Route::get('my-team', [TeamController::class, 'index'])->name('team.index');
    Route::get('/rate/{id}', [TeamController::class, 'rate'])->name('team.rate');

    // Company
    Route::get('companies', [CompanyController::class, 'index'])->name('company.index');
    Route::get('company/add', [CompanyController::class, 'create'])->name('company.add');
    Route::post('company/store/{id}', [CompanyController::class, 'store'])->name('company.store');
    Route::get('company/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
    Route::get('company/delete/{id}', [CompanyController::class, 'destroy'])->name('company.delete');
 
    // Role
    Route::get('user-role', [RoleController::class, 'index'])->name('role.index');
    Route::get('user-role/add', [RoleController::class, 'create'])->name('role.add');
    Route::post('user-role/store/{id}', [RoleController::class, 'store'])->name('role.store');
    Route::get('user-role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::get('user-role/delete/{id}', [RoleController::class, 'destroy'])->name('role.delete');
    
    // Group
    Route::get('user-groups', [UserGroupsController::class, 'index'])->name('ugroup.index');
    Route::get('user-groups/add', [UserGroupsController::class, 'create'])->name('ugroup.add');
    Route::post('user-groups/store/{id}', [UserGroupsController::class, 'store'])->name('ugroup.store');
    Route::get('user-groups/edit/{id}', [UserGroupsController::class, 'edit'])->name('ugroup.edit');
    Route::get('user-groups/delete/{id}', [UserGroupsController::class, 'destroy'])->name('ugroup.delete');
});


