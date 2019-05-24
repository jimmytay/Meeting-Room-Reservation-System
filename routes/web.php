<?php
use App\Notifications\Email;
use App\User;
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

Route::resource('mrs','mrsController');

Auth::routes();
Route::get('mrs.fullcalendar','mrsController@index');
Route::get('mrs.show','mrsController@show');
Route::get('/admin','Auth\AdminloginController@index')->name('admin.dashboard');
Route::get('/home','HomeController@index');
Route::get('/menu','HomeController@menu');
Route::get('/admin/login','Auth\AdminloginController@showloginForm')->name('admin.login');
Route::post('/admin/login','Auth\AdminloginController@login')->name('admin.login.submit');

Route::get('logout', 'Auth\LoginController@logout');

Route::get('mrs.store', function(){
  $user=user::first();

  $user->notify(new Email);
});
