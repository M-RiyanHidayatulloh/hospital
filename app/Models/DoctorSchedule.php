<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class DoctorSchedule extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'user_id',
        'day_of_week',
        'start_time',
        'end_time',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
