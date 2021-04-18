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

Route::resource('/programme', 'ProgrammeController');


Route::get('/valid/{start_time}/{start_day}/{end_time}/{end_day}/{room_number}', 'ProgrammeController@valid');

Route::get('/prgcreate/{name}/{start_time}/{start_day}/{end_time}/{end_day}/{room_number}', function ($name, $start_time, $start_day, $end_time, $end_day, $room_number) {

    Programme::create(['name' => $name, 'start_time' => $start_time, 'start_day' => $start_day,
        'end_time' => $end_time, 'end_day' => $end_day, 'room_number' => $room_number, 'admin_by' => 'marius']);


});
Route::get('/usercreate',function (){
    $program=Programme::findOrFail(1);
    $user=new User(['name'=>'ion','cnp'=>'345']);
    $program->users()->save($user);
});

Route::get('/prgdelete/{id}', function ($id){
    $program = Programme::where('id', $id)->first(); // File::find($id)

    if($program) {

        return $program->delete();
    }
});
