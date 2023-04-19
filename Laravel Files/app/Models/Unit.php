<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'address',
        'price',
        'type',
        'for_what',
        'date_of_posting',
        'is_available',
        'imag',
        'components',
    ];

    protected $casts = [
        'imag' => 'array',
        'components' => 'array',
    ];

    /////////////////////////////////////////////////
}
