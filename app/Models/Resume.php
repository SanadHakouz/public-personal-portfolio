<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'is_active'
    ];

    // Get the active resume
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
