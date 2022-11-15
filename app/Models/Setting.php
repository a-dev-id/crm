<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_confirm',
        'benefit_experience',
        'check_in_out',
        'experience',
        'term_condition',
        'location',
        'phone',
        'mobile',
        'email',
        'check_in_time',
        'check_out_time',
    ];
}
