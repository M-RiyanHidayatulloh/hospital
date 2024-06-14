<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'riview' => 'string|review',

    ];

    public function appointment()
    {
        return $this->belongsTo(Patient::class);
    }
}
