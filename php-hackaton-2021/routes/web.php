<?php
namespace App;
use App\Http\Controllers\ProgrammeController;
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

Route::resource('/programme','ProgrammeController');
Route::resource('/room','RoomController');
Route::resource('/user','UserController');

Route::get('/valid/{start_time}/{end_time}/{day}/{room_number}','ProgrammeController@valid');
