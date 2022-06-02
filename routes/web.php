<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic;
use App\Http\Controllers\StudentController;

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
    return view('check');
});
Route::get('admin', function () {
    return view('pages.index');
});
Route::get('qr-generate', [StudentController::class, 'qr_generate'])->name('qr-generate');
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
Route::get('add-student', [StudentController::class, 'index'])->name('add-student');

Route::post('import-student', [StudentController::class, 'importStudent'])->name('import-student');