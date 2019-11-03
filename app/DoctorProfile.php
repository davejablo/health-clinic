<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DoctorProfile extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'phone', 'locality', 'user_id', 'gender', 'birthDate', 'specialization_id', 'street'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctorSpecialization()
    {
        return $this->belongsTo(DoctorSpecialization::class);
    }

    public function getAge(){
        return $age = Carbon::parse($this->birthDate)->age;
    }

    public function getBirthDate(){
        return $birthDate = Carbon::parse($this->birthDate)->format('d/m/Y');
    }
}
