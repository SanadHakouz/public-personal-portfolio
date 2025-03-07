<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TechnologyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'color',
        'display_order',
    ];

    public function technologies(): HasMany
    {
        return $this->hasMany(Technology::class, 'category_id')
                    ->where('is_active', true)
                    ->orderBy('display_order');
    }
}
