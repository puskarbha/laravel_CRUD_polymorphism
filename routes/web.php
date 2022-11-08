<?php

use App\Models\photo;
use App\Models\Staff;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/create',function(){
   $staff=Staff:: find(1);
   $staff->photos()->create(['path'=>'example.jpg']);
});

Route::get('/read',function(){
   $staff=Staff::find(1);
   foreach ($staff->photos as $photo){
       echo $photo->path;
   }
});

Route::get('/update',function(){
   $staff=Staff::findOrfail(1);
   foreach($staff->photos as $photo){
      if($photo->whereId(1)){
          $photo->path='updated example.jpg';
          $photo->save();
      }
   }
});

Route::get('/delete',function(){
   $staff=Staff::findOrFail(1);
   $staff->photos()->delete();
});

Route::get('assign',function(){
   $staff = Staff::findOrFail(1);
   $photo = Photo::findOrFail(2);

   $staff->photos()->save($photo);
});
