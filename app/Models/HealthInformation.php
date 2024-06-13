<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthInformation extends Model
{
    use HasFactory;
    protected $table = 'health_informations';
    protected $fillable = [
        'title',
        'content',
        'image',
        'category',
    ];
}
