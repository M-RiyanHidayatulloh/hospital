<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Doctor extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'doctors';

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'user_id',
        'doctor_name',
        'image',
        'specialization',
        'phone',
        'available_times',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
