<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
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
    return view('pages.index');
});
 
Route::get('qr', function () {
 
    $card = ImageManagerStatic::make('card/card.jpg')->resize(2000, 3000);
  
    

  
    


    $dns = new DNS2D;
    $str=rand(); 

$result = md5($str); 

$qr_data = "KIOT-".substr($result, 0, 10);
   
    $barcode = Image::make(DNS1D::getBarcodePNG('146666666', 'C39E+'))->resize(1500, 400);
    $card->insert($barcode, '', 200, 2300);



   

  
 


    $card->save('cards/'. "ff".time().$card . '.png');

 
});
Route::get('add-student', [StudentController::class, 'index'])->name('add-student');

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
