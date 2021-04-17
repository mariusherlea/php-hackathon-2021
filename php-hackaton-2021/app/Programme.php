<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
public function rooms(){
    return $this->hasOne(Room::class);
}

public function users(){
    return $this->belongsTo(User::class);
}
}
