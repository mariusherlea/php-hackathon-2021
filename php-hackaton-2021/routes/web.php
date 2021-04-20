<?php

namespace App;

use App\Http\Controllers\ProgrammeController;
use Illuminate\Support\Facades\DB;
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


Route::get('/valid/{start_time}/{start_day}/{end_time}/{end_day}/{seats_remaining}', 'ProgrammeController@valid');

Route::get('/prgcreate/{name}/{start_time}/{start_day}/{end_time}/{end_day}/{seats_remaining}', function ($name, $start_time, $start_day, $end_time, $end_day, $seats_remaining) {


    $result = DB::select('select * from programmes where start_time=:start_time and start_day=:start_day and end_time=:end_time and end_day=:end_day and seats_remaining=:seats_remaining',
        ['start_time' => $start_time, 'start_day' => $start_day, 'end_time' => $end_time, 'end_day' => $end_day, 'seats_remaining' => $seats_remaining]);
    foreach ($result as $post) {
        return "Exist a duplicate in db: " . $post->name;
    }


    if (!$result) {
        Programme::create(['name' => $name, 'start_time' => $start_time, 'start_day' => $start_day,
            'end_time' => $end_time, 'end_day' => $end_day, 'seats_remaining' => $seats_remaining, 'admin_by' => 'marius']);
    }




});
Route::get('/usercreate/{id}',function ($id){
    $program=Programme::findOrFail($id);
$seat=$program->seats_remaining;
if($seat>0) {
    $seat = $seat - 1;
//  $program->seats_remaining->create($seat);
    Programme::where('id', $id)->update(['seats_remaining' => $seat]);

    $user = new User();
    $program->users()->save($user);
}
else{
    echo 'full';
}
});

Route::get('/prgdelete/{id}', function ($id){
    $program = Programme::where('id', $id)->first(); // File::find($id)

    if($program) {

        return $program->delete();
    }
});
