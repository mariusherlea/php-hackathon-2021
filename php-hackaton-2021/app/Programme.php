<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{

    protected $fillable=[
        'name',
        'start_time',
        'start_day',
        'end_time',
        'end_day',
        'room_number',
        'admin_by',
        'seats_remaining'

    ];

public function users(){
    return $this->hasMany(User::class);
}


}
