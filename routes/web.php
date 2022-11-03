<?php

use Carbon\Carbon;
use App\Models\User;
use App\Events\NewMessage;
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\AuthController;
 
use App\Http\Controllers\userController;
 
use Intervention\Image\ImageManagerStatic;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DashboardContorller;
use App\Http\Controllers\SuperAdminController;


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
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    \Artisan::call('view:cache');
    \Artisan::call('view:clear');

    return back();
});
Route::middleware(['auth'])->group(function () {
// Super Admin Route
Route::middleware(['super-admin'])->group(function () {
    Route::get('admin-dashboard', [DashboardContorller::class, 'superAdmin'])->name('superAdminDashboard');
    Route::get('user-index', [SuperAdminController::class, 'user'])->name('add-user');
    Route::get('qr-generate', [StudentController::class, 'qr_generate'])->name('qr-generate');
    Route::get('add-student', [StudentController::class, 'index'])->name('add-student');
    Route::get('Materials', [SuperAdminController::class, 'materials'])->name('materials');
    Route::get('request-status', [SuperAdminController::class, 'RequestStatus'])->name('request-status');
    Route::get('store-status',[SuperAdminController::class, 'StoreStatus'])->name('store-status');
    Route::get('roles',[SuperAdminController::class, 'roles'])->name('roles');
    Route::get('Measurement', [SuperAdminController::class, 'measurement'])->name('measurement');
    Route::get('schedule', [SuperAdminController::class, 'schedule'])->name('schedule');
    Route::get('schedules', [SuperAdminController::class, 'schedules'])->name('schedules');
    Route::get('Student-Report', [SuperAdminController::class, 'TickerStudentReport'])->name('tickerReport');
    Route::post('import-student', [StudentController::class, 'importStudent'])->name('import-student');
});


Route::middleware(['store-admin'])->group(function () {
    Route::get('store-dashboard', [DashboardContorller::class, 'storeAdmin'])->name('storeDashboard');
    Route::get('store-index', [SuperAdminController::class, 'storeIndex'])->name('store-index');
    Route::get('request-item', [DashboardContorller::class, 'requestItem'])->name('request-item');
    Route::get('store-report',[DashboardContorller::class, 'storeReport'])->name('storeReport');
    Route::get('store',[SuperAdminController::class, 'store'])->name('store');


});

Route::middleware(['admin'])->group(function () {
    Route::get('dashboard', [DashboardContorller::class, 'betDashboard'])->name('betDashboard');
    Route::get('out-store', [SuperAdminController::class, 'outstore'])->name('out-store');


});

Route::get('logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('profile', function(){
return view('pages.profile');
})->name('profile');

Route::get('qr', function () {
    /* This sets the $time variable to the current hour in the 24 hour clock format */
    $time = date("H");
    /* Set the $timezone variable to become the current timezone */
    $timezone = date("e");
    /* If the time is less than 1200 hours, show good morning */
    if ($time < "12") {
        echo "Good morning";
    } else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "17") {
        echo "Good afternoon";
    } else
    /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
    if ($time >= "17" && $time < "19") {
        echo "Good evening";
    } else
    /* Finally, show good night if the time is greater than or equal to 1900 hours */
    if ($time >= "19") {
        echo "Good night";
    }
 });
 
  
}); //auth end
 

Route::get('/', function () {
    return view('check');
});
 






// Property
Route::get('request',  [PropertyController::class, 'index'])->name('propertyRequest');




Route::get('login',[AuthController::class, 'Login'])->name('login');

Route::post('import-student', [StudentController::class, 'importStudent'])->name('import-student');
//users
Route::get('/add-user', function () {
    return view('pages.user.add_users');
});
Route::get('/view_user',[userController::class,'view_users']);
Route::post('/add_users',[userController::class,'add_users'])->name('add_users');
Route::get('/edit_user/{id}',[userController::class,'edit_users'])->name('edit_user');
Route::post('/update_user/{id}',[userController::class,'update_users'])->name('update_user');
Route::get('/delete_user/{id}',[userController::class,'delete_users'])->name('delete_user');