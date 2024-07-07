<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'speciality',
    ];

    const SPECIALITY = [
        'Blacksmith',
        'Armorer',
        'enchanter',
    ];


    public function items()
    {
        return $this->belongsToMany(Item::class, 'creator_item');
    }
}
