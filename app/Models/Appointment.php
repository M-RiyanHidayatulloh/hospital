<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'doctor_id',
        'room_id',
        'date',
        'status',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function doctor()
    // {
    //     return $this->belongsTo(User::class, 'doctor_user_id');
    // }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
