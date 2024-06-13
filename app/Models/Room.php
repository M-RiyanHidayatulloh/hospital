<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Room extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'room_number',
        'room_type',
        'availability',
        'capacity'
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
