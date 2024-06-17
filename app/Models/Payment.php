<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Payment extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    protected $table = 'payments';
    protected $guarded = [];

    protected $fillable = [
        'appointment_id',
        'patient_user_id',
        'amount',
        'payment_date',
        'status'
    ];

    // public function patient()
    // {
    //     return $this->belongsTo(Patient::class);
    // }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_user_id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

}
