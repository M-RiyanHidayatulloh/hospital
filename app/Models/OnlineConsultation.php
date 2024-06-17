<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineConsultation extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'consultation_date',
        'consultation_mode',
        'notes',
        // 'amount',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
