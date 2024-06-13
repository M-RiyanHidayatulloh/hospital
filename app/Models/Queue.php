<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class Queue extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = [
        'appointment_id',
        'queue_number',
        'status',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}

