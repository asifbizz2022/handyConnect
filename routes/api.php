<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\EmployeeRegisterController;
use App\Http\Controllers\API\SimpleRegisterController;
use App\Http\Controllers\API\OptimizeRegisterController;
use App\Http\Controllers\API\UserController; 
use App\Http\Controllers\API\CategoryController; 
use App\Http\Controllers\frontend\ServicesController;
 
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//WebView
Route::any('/registerWeb', [RegisterController::class, 'register'])->name('registerWeb');
Route::any('/loginWeb', [RegisterController::class, 'login'])->name('loginWeb');
Route::any('/logoutWeb', [RegisterController::class, 'logout'])->name('logoutWeb');
Route::any('/password/forgot-password', [RegisterController::class, 'ForgotPasswordlink'])->name('passwords.sent');
Route::any('/password/reset-password/{token}', [RegisterController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::any('/password/reset-password', [RegisterController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');

//EmployeeView
Route::post('/employee/register', [EmployeeRegisterController::class, 'register'])->name('register.Employee');
Route::post('/employee/login', [EmployeeRegisterController::class, 'login_check'])->name('login.Employee'); 
Route::any('/employee/logout', [EmployeeRegisterController::class, 'logout'])->name('logout.Employee');

Route::any('/employee/password/forgot-password', [EmployeeRegisterController::class, 'ForgotPasswordlink'])->name('Employee.passwords.sent');
Route::any('/employee/password/reset-password/{token}', [EmployeeRegisterController::class, 'ResetPassword'])->name('Employee.ResetPasswordGet');
Route::any('/employee/password/reset-password', [EmployeeRegisterController::class, 'ResetPasswordStore'])->name('Employee.ResetPasswordPost');

Route::get('/employee/get/dashboard/{id}',[EmployeeRegisterController::class, 'get_employee_dashboard']);
Route::get('/employee/get/profile/{id}',[EmployeeRegisterController::class, 'get_employee_profile']);
Route::post('/employee/update/profile',[EmployeeRegisterController::class, 'update_employee_profile']);
Route::get('/employee/past/job/history/{id}',[EmployeeRegisterController::class, 'past_job_history']);
Route::get('/employee/past/job/details',[EmployeeRegisterController::class, 'past_job_details']);

Route::get('/employee/assigned/task/details',[EmployeeRegisterController::class, 'assigned_task_details']);
Route::post('/employee/clock/in',[EmployeeRegisterController::class, 'clock_in']);
Route::post('/employee/clock/out',[EmployeeRegisterController::class, 'clock_out']); 
Route::get('/employee/assigned/task/{id}',[EmployeeRegisterController::class, 'assigned_task']);

Route::get('/employee/start/job/screen/{id}',[EmployeeRegisterController::class, 'start_screen']);
Route::get('/employee/end/job/screen/{id}',[EmployeeRegisterController::class, 'end_screen']); 

Route::post('/employee/startjob/image',[EmployeeRegisterController::class, 'upload_startjob_image']);
Route::post('/employee/endjob/image',[EmployeeRegisterController::class, 'upload_endjob_image']);

Route::post('/employee/upload/signature',[EmployeeRegisterController::class, 'upload_signature']);


//these are for user 
Route::any('/simpleview/register', [SimpleRegisterController::class, 'register'])->name('register.simpleview');
Route::any('/simpleview/login', [SimpleRegisterController::class, 'login'])->name('login.simpleview');
Route::any('/simpleview/logout', [SimpleRegisterController::class, 'logout'])->name('logout.simpleview');
Route::any('/simpleview/password/forgot-password', [SimpleRegisterController::class, 'ForgotPasswordlink'])->name('.simpleview.passwords.sent');
Route::any('/simpleview/password/reset-password/{token}', [SimpleRegisterController::class, 'ResetPassword'])->name('simpleview.ResetPasswordGet');
Route::any('/simpleview/password/reset-password', [SimpleRegisterController::class, 'ResetPasswordStore'])->name('simpleview.ResetPasswordPost');

//Optimizeview of user 

Route::any('/optimizeview/register', [OptimizeRegisterController::class, 'register'])->name('register.optimizeview');
Route::any('/optimizeview/login', [OptimizeRegisterController::class, 'login'])->name('login.optimizeview');
Route::any('/optimizeview/logout', [OptimizeRegisterController::class, 'logout'])->name('logout.optimizeview'); 
Route::any('/optimizeview/password/forgot-password', [OptimizeRegisterController::class, 'ForgotPasswordlink'])->name('OptimizeView.passwords.sent');
Route::any('/optimizeview/password/reset-password/{token}', [OptimizeRegisterController::class, 'ResetPassword'])->name('OptimizeView.ResetPasswordGet');
Route::any('/optimizeview/password/reset-password', [OptimizeRegisterController::class, 'ResetPasswordStore'])->name('OptimizeView.ResetPasswordPost');

//Category Routes
Route::any('/simpleview/category',[CategoryController::class,'index'])->name('category.index');
Route::any('/simpleview/category/create',[CategoryController::class,'create'])->name('category.create');
Route::any('/simpleview/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::any('/simpleview/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::any('/simpleview/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete'); 
Route::get('/simpleview/services/get', [CategoryController::class,'get_simple_services'])->name('simple.services.show');
Route::get('/simpleview/services', [CategoryController::class,'get_simple_services_list']);
Route::post('/simpleview/add/description',[CategoryController::class, 'add_description']);
Route::post('/simpleview/remark/upload/image', [CategoryController::class, 'store_service_image']); 
 
//categorey optimize view
Route::get('/optimizeview/services/get', [CategoryController::class,'get_optimize_services'])->name('optimize.services.show');
Route::post('/optimizeview/remark/upload/image', [CategoryController::class, 'store_service_image']);
Route::post('/optimizeview/add/description',[CategoryController::class, 'add_description']);
Route::get('/optimize/get/appointments', [CategoryController::class, 'get_appointments']);
Route::post('/optimize/book/appointment', [CategoryController::class, 'book_appointment']);
Route::get('/optimize/get/past/appointments/{id}',[CategoryController::class,'get_past_appointments']); 
Route::get('/optimize/get/single/appointment/{id}',[CategoryController::class,'get_single_appointments']);
Route::get('/optimize/get/appointment/details/{id}',[CategoryController::class,'get_appointment_details']); 
Route::get('/optimize/quotation/{id}',[CategoryController::class,'get_quotation']);
Route::get('/optimize/scope/work/{id}',[CategoryController::class, 'get_scopes']); 
Route::get('/optimize/profile/management/{id}',[CategoryController::class, 'profile_management']);
Route::post('/optimize/profile/update',[CategoryController::class, 'profile']);

Route::get('/optimize/see/all',[CategoryController::class, 'see_all']);
Route::get('/optimize/see/services/{id}',[CategoryController::class, 'see_all_list']);
