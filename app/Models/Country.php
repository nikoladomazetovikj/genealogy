<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'iso2',
        'iso3',
        'name',
        'isd',
        'is_eu',
    ];

    protected $casts = [
        'is_eu' => 'boolean',
    ];

    /* -------------------------------------------------------------------------------------------- */
    // Accessors & Mutators
    /* -------------------------------------------------------------------------------------------- */
    protected function Iso2(): Attribute
    {
        return new Attribute(
            set: fn ($value) => $value ? strtoupper($value) : null,
        );
    }

    protected function Iso3(): Attribute
    {
        return new Attribute(
            set: fn ($value) => $value ? strtoupper($value) : null,
        );
    }
}
