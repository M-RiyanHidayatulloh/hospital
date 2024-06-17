<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MedicalRecord extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'room_id',
        'patient_user_id',
        'doctor_user_id',
        'diagnosis',
        'treatment'
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_user_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_user_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
