<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
            'name',
            'email',
            'phone',
            'date_of_birth',
            'country',
            'status',
    ];

    public function ConfirmationLetter()
    {
        return $this->hasMany(ConfirmationLetter::class, 'guest_id', 'id');
    }
}


