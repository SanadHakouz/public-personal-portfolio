<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'display_order',
        'is_active',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(TechnologyCategory::class, 'category_id');
    }
}
