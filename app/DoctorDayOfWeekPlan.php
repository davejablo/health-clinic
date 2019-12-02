<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorDayOfWeekPlan extends Model
{
    public function doctorProfile()
    {
        return $this->belongsTo('App\DoctorProfile');
    }
    //
}
