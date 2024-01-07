<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'description',
    ];

    protected static function booted()
    {
        parent::booted();

        static::creating(function ($sensor) {
            $names = explode(' ', strtolower($sensor->name));
            $sensor->code = implode('-', $names);
        });

        static::updating(function ($sensor) {
            $names = explode(' ', strtolower($sensor->name));
            $sensor->code = implode('-', $names);
        });
    }
}
