<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class box extends Model
{
    use HasFactory;
    /**
     * Get all of the comments for the box
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boxitems(): HasMany
    {
        return $this->hasMany(boxitem::class);
    }
}
