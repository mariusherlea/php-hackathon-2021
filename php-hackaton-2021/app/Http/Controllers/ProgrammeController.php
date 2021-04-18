<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProgrameRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function valid($start_time,$start_day,$end_time,$end_day,$room_number){
        $result = DB::select('select * from programmes where start_time=:start_time and start_day=:start_day and end_time=:end_time and end_day=:end_day and room_number=:room_number',
            ['start_time'=>$start_time,'start_day'=>$start_day,'end_time'=>$end_time, 'end_day'=>$end_day, 'room_number'=>$room_number]);
        foreach ($result as $post) {
            return "It cannot duplicate ".$post->name;
        }

        if(!$result){
            return "Your good to go in book program";
        }
    }


}
