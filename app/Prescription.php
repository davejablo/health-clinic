<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'appointment_id', 'description'
    ];

    public function appointment()
    {
        return $this->belongsTo('App\Appointment');
    }

    public function medicines(){
        return $this->belongsToMany('App\Medicine');
    }
}
