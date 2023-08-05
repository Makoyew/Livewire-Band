<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public function musicband()
    {
        return $this->belongsTo(Musicband::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // protected $table = 'bookings';
    protected $fillable = [
        'eventname',
        'eventlocation',
        'eventdescription',
        'timestart',
        'timeend',
        'status'
    ];
}
