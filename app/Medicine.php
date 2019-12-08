<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'status', 'name', 'name_international', 'form', 'dose', 'package_quantity', 'price'
    ];

    public function prescriptions(){
        return $this->belongsToMany('App\Prescription');
    }
    //
}
