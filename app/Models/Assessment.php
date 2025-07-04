<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'score',
        'results'
    ];

    protected $casts = [
        'results' => 'array'
    ];
}