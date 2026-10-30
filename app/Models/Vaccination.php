<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'purok',
        'vaccine',
        'dose',
        'scheduled_at',
        'status',
    ];

    protected $casts = [
        'scheduled_at' => 'date',
    ];
}