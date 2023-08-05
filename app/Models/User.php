<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory, Notifiable;

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }


    public function getRatingAttribute()
    {
        return $this->feedbacks->avg('rating');
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'image',
        'username',
        'name',
        'email',
        'location',
        'password',
        'newpassword',
        'description',

    ];
}
