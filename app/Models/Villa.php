<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
            'wide',
            'pool_type',
            'view',
            'description',
    ];

    public function ConfirmationLetter()
    {
        return $this->hasMany(ConfirmationLetter::class);
    }
}
