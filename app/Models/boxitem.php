<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boxitem extends Model
{
    use HasFactory;
   /**
    * The roles that belong to the boxitem
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
   public function items(): BelongsToMany
   {
       return $this->belongsToMany(item::class);
   }
}
