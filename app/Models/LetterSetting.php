<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterSetting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'description'];
    protected $casts = [
        'value' => 'string', 
    ];

    public static function getSetting($key, $default = null)
    {
        return static::where('key', $key)->first()->value ?? $default;
    }

    public static function setSetting($key, $value, $description = null)
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'description' => $description]
        );
    }
}