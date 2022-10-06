<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmationLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'guest_id',
        'confirmation_no',
        'arrival',
        'departure',
        'adult',
        'child',
        'villa_id',
        'currency',
        'price',
    ];

    public function GuestDetail()
    {
        return $this->belongsTo(Guest::class, 'guest_id', 'id');
    }

    public function VillaDetail()
    {
        return $this->belongsTo(Villa::class);
    }
}
