<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function appointments()
    {
        return $this->hasMany('App\Appointments');
    }
    //
}
