<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function item(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
