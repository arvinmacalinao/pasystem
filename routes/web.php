<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Team2Controller;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HRAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserGroupsController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeOffenseController;
use App\Http\Controllers\OrchartUserGroupsController;

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
    Route::middleware(['role:HR Admin|Superadmin'])->group(function () {
    // Route::group(['middleware' => 'auth'], function () {
    Route::any('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('my.profile');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('edit.profile');
    Route::post('/profile/store/{id}', [ProfileController::class, 'store'])->name('store.profile');

    Route::get('/change-password', [ProfileController::class, 'Changepasswordform'])->name('password.form');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('password.change');

    //Team
    Route::any('my-subordinate', [TeamController::class, 'index'])->name('team.index');
    Route::get('/rate/{id}', [TeamController::class, 'rate'])->name('team.rate');
    Route::post('my-subordinate/{id}appraise/{appraise_id}', [TeamController::class, 'appraise'])->name('team.appraise');
    Route::any('/subordinate/copy-rating/{id}', [TeamController::class, 'copyRating'])->name('team.copy.rating');
    Route::get('/subordinate/view/{id}', [TeamController::class, 'view'])->name('team.view');
    Route::get('my-subordinate/download/{id}', [TeamController::class, 'download'])->name('download.pdf');

    Route::any('my-subordinate2',                                       [Team2Controller::class, 'index'])->name('team.index2');
    Route::get('/rate2/{id}/{period}/',                                 [Team2Controller::class, 'rate2'])->name('team.rate2');
    Route::get('/validate-period/{id}/{startMonth}/{endMonth}/{year}',  [Team2Controller::class, 'validatePeriod']);
    Route::post('my-subordinate/{id}appraise2/{appraise_id}/{period}/', [Team2Controller::class, 'appraise2'])->name('team.appraise2');
    Route::any('/subordinate/copy-rating2/{id}',                        [Team2Controller::class, 'copyRating2'])->name('team.copy.rating2');
    Route::get('/subordinate/view2/{id}',                               [Team2Controller::class, 'view'])->name('team.view2');
    Route::get('my-subordinate/download2/{id}',                         [Team2Controller::class, 'download'])->name('download.pdf2');

    /* Notification */
    Route::any('notifications', [NotificationController::class, 'index'])->name('notification.list');
    Route::get('mark-single-as-read/{notification}', [NotificationController::class, 'markSingleAsRead'])->name('mark-single-as-read');
    Route::post('mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('mark-selected-as-read');

    /* Job Level */
    Route::get('/job-level', [HomeController::class, 'joblevel'])->name('job.level');
    Route::get('/org-chart', [HomeController::class, 'orgchart'])->name('org.chart');

    Route::get('employee-offenses/view/{id}', [EmployeeOffenseController::class, 'view'])->name('employee.offense.view');
    Route::get('my-subordinate/disiplinaryaction/{id}', [TeamController::class, 'da'])->name('team.offense.record');

    // testing
    Route::any('test', [TestController::class, 'index'])->name('test.index');
    Route::get('test/add', [TestController::class, 'create'])->name('test.add');
    Route::post('test/store/{id}', [TestController::class, 'store'])->name('test.store');
    Route::get('test/edit/{id}', [TestController::class, 'edit'])->name('test.edit');
    Route::get('test/delete/{id}', [TestController::class, 'destroy'])->name('test.delete');

    Route::get('employee/download/matrix/{id}', [UserController::class, 'hrdownloadexcel'])->name('employee.download.excel');
});

// EMPLOYEE RECORD
    Route::middleware(['role:HR Admin|Superadmin'])->group(function () {
    Route::any('employees', [UserController::class, 'index'])->name('employee.index');
    Route::get('employee/add', [UserController::class, 'create'])->name('employee.add');
    Route::post('employee/store/{id}', [UserController::class, 'store'])->name('employee.store');
    Route::get('employee/edit/{id}', [UserController::class, 'edit'])->name('employee.edit');
    Route::get('employee/delete/{id}', [ UserController::class, 'destroy'])->name('employee.delete');
    Route::get('employee/view/{id}', [UserController::class, 'view'])->name('employee.view');
    Route::get('employee/reset/{id}', [UserController::class, 'reset'])->name('employee.reset');
    Route::get('employee/active/{id}', [UserController::class, 'active'])->name('employee.active');
    Route::get('employee/enable/{id}', [UserController::class, 'enable'])->name('employee.enable');
    Route::get('employee/force_rate/{id}', [UserController::class, 'force_rate'])->name('employee.force_rate');
    Route::get('employee/resetpassword/{id}', [UserController::class, 'resetpassword'])->name('employee.resetpassword');
    Route::get('employee/download/appraisal/{id}', [TeamController::class, 'hrdownload'])->name('employee.download.pdf');
    Route::post('/clear-session', [UserController::class, 'clearSession'])->name('clear.session');

    // Fill up Attendance
    Route::any('hr-attendance', [HRAdminController::class, 'index'])->name('hr.attendance.index');
    Route::get('hr-attendance/{id}/rate/{period}', [HRAdminController::class, 'rate'])->name('hr.attendance.rate');
    Route::post('hr-attendance/{id}/attendance/{attendance_id}', [HRAdminController::class, 'store'])->name('hr.attendance.store');
    Route::get('hr-attendance/{id}/attendance-view/', [HRAdminController::class, 'view'])->name('hr.attendance.view');
    
   
    // Company
    Route::any('companies', [CompanyController::class, 'index'])->name('company.index');
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

    // Designation
    Route::get('user-designation', [DesignationController::class, 'index'])->name('designation.index');
    Route::get('user-designation/add', [DesignationController::class, 'create'])->name('designation.add');
    Route::post('user-designation/store/{id}', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('user-designation/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
    Route::get('user-designation/delete/{id}', [DesignationController::class, 'destroy'])->name('designation.delete');
    
    // Group
    Route::get('user-groups', [UserGroupsController::class, 'index'])->name('ugroup.index');
    Route::get('user-groups/add', [UserGroupsController::class, 'create'])->name('ugroup.add');
    Route::post('user-groups/store/{id}', [UserGroupsController::class, 'store'])->name('ugroup.store');
    Route::get('user-groups/edit/{id}', [UserGroupsController::class, 'edit'])->name('ugroup.edit');
    Route::get('user-groups/delete/{id}', [UserGroupsController::class, 'destroy'])->name('ugroup.delete');

    // Orgchart Group
    Route::get('orgchat/user-groups', [OrchartUserGroupsController::class, 'index'])->name('ugroup.orgchart.index');
    Route::get('orgchat/user-groups/add', [OrchartUserGroupsController::class, 'create'])->name('ugroup.orgchart.add');
    Route::post('orgchat/user-groups/store/{id}', [OrchartUserGroupsController::class, 'store'])->name('ugroup.orgchart.store');
    Route::get('orgchat/user-groups/edit/{id}', [OrchartUserGroupsController::class, 'edit'])->name('ugroup.orgchart.edit');
    Route::get('orgchat/user-groups/delete/{id}', [OrchartUserGroupsController::class, 'destroy'])->name('ugroup.orgchart.delete');

    // Employee Offenses
    Route::any('employee-offenses', [EmployeeOffenseController::class, 'index'])->name('employee.offenses.index');
    Route::get('employee-offenses/add', [EmployeeOffenseController::class, 'create'])->name('employee.offense.add');
    Route::post('employee-offenses/store/{id}', [EmployeeOffenseController::class, 'store'])->name('employee.offense.store');
    Route::get('employee-offenses/edit/{id}', [EmployeeOffenseController::class, 'edit'])->name('employee.offense.edit');
    Route::get('employee-offenses/delete/{id}', [EmployeeOffenseController::class, 'destroy'])->name('employee.offense.delete');
    
    // Reports Completed
    Route::any('Completed-Rating', [ReportsController::class, 'complete_rating'])->name('complete.rating.index');
    Route::get('/export-complete-rating', [ReportsController::class, 'exportCompleteRating'])->name('export.complete_rating');

});


