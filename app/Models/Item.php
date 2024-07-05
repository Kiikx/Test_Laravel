<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'decimal:2',
    ];

    /**
     * Les valeurs possibles pour l'énumération type.
     */
    const TYPES = [
        'weapon',
        'armor',
        'magic',
    ];

    /**
     * Valide que le type est une valeur correcte.
     *
     * @param string $value
     * @return bool
     */
    public static function isValidType(string $value): bool
    {
        return in_array($value, self::TYPES);
    }

    public function creators()
    {
        return $this->belongsToMany(Creator::class);
    }
}

