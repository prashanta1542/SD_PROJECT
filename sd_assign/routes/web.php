<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\DepartmentAdminController;
use App\Http\Controllers\TeacherController;


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
Route::get('/',[EmployeeController::class,'home']);
Route::get('login', [EmployeeController::class,'loginview']);
Route::post('loginuser', [EmployeeController::class,'loginuser']);


Route::get('register', [EmployeeController::class,'registerview']);
Route::post('registerstore', [EmployeeController::class,'registerstore']);

Route::get('otp', [EmployeeController::class,'otpview']);
Route::post('otpverify', [EmployeeController::class,'otpverify']);

Route::middleware(['islogin'])->group(function () {
    Route::get('admin/dashboard',[SuperAdminController::class,'dashboard']);
    Route::get('logout',[SuperAdminController::class,'logout']);

    Route::get('admin/createdepartment',[SuperAdminController::class,'departmentcreate']);
    Route::post('createdepartment',[SuperAdminController::class,'makedepartment']);
    Route::get('admin/editedepartment/{id}',[SuperAdminController::class,'editdepartment']);
    Route::post('updatedepartment/{id}',[SuperAdminController::class,'updatedepartment']);
    Route::get('admin/deletedepartment/{id}',[SuperAdminController::class,'deletedepartment']);

    Route::get('admin/viewdepartment',[SuperAdminController::class,'showdepartment']);
    Route::get('admin/showemployee',[SuperAdminController::class,'showemployee']);
    Route::get('accept/{id}',[SuperAdminController::class,'accept']);
    Route::get('delete/{id}',[SuperAdminController::class,'delete']);

    Route::get('admin/viewteacher/{id}',[SuperAdminController::class,'viewteacher']);
    Route::get('changerole/{id}',[SuperAdminController::class,'editrole']);
    Route::get('changeadmin/{id}',[SuperAdminController::class,'updaterole']);

});


Route::middleware(['islogin'])->group(function () {
Route::get('department/dashboard',[DepartmentAdminController::class,'dashboard']);
// seession handle route
Route::get('department/createsession',[DepartmentAdminController::class,'makesession']);
Route::post('makesession',[DepartmentAdminController::class,'sessioncreate']);

Route::get('department/allsession',[DepartmentAdminController::class,'allsession']);

Route::get('department/editsession/{id}',[DepartmentAdminController::class,'editsession']);
Route::post('updatesession/{id}',[DepartmentAdminController::class,'updatesession']);
Route::get('sessiondelete/{id}',[DepartmentAdminController::class,'deletesession']);
// seession handle route

Route::get('department/createsemester',[DepartmentAdminController::class,'createsemester']);
Route::post('addsemester',[DepartmentAdminController::class,'addsemester']);

Route::get('department/showsemester',[DepartmentAdminController::class,'showsemester']);

});


Route::middleware(['islogin'])->group(function () {
Route::get('teacher/dashboard',[TeacherController::class,'dashboard']);
});