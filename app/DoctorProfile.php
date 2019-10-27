<?php

namespace App;

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
        'name', 'surname', 'phone', 'locality', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
