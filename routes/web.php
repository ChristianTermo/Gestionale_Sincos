<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EditDataController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\help4youcontroller\AdminController;

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
Route::get('/', [CustomAuthController::class, 'index'])->name('/');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');


Route::middleware([RedirectToLogin::class])->group(function () {
Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('timesheet', [TimesheetController::class, 'getTimesheet'])->name('timesheet');
Route::get('richiestaferie', [HolidayController::class, 'getRichiestaFerie'])->name('richiestaferie');
Route::post('setTimesheet',[TimesheetController::class,'setTimesheet'])->name('setTimesheet');
Route::post('requireHoliday', [HolidayController::class, 'requireHoliday'])->name('requireHoliday');
route::get('registerForm', [CustomAuthController::class, 'getRegisterForm'])->name('registerForm');
Route::post('register', [CustomAuthController::class, 'register'])->name('register');
Route::get('panel', [CustomAuthController::class, 'getPanel'])->name('panel');
Route::get('getHolidays', [HolidayController::class, 'getHolidayRequest'])->name('getHolidays');
Route::post('acceptHolidays', [HolidayController::class, 'acceptHoliday'])->name('acceptHolidays');
Route::post('declineHolidays', [HolidayController::class, 'declineHoliday'])->name('declineHolidays');
Route::get('getHoliday', [HolidayController::class, 'getHoliday'])->name('getHoliday');
Route::get('users', [CustomAuthController::class, 'getUsers'])->name('users');
Route::post('printTimesheet',[TimesheetController::class,'printTimesheet'])->name('printTimesheet');
Route::get('editData', [EditDataController::class, 'index'])->name('editData');
Route::post('edit', [EditDataController::class, 'update'])->name('edit');
Route::get('getHoursPerDay', [TimesheetController::class, 'getHoursPerDay'])->name('getHoursPerDay');
Route::get('changePassword', [EditDataController::class, 'changePassword'])->name('changePassword');
Route::post('submitNewPassword', [EditDataController::class, 'submitNewPassword'])->name('submitNewPassword');
});