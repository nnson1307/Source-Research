<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    /**
     * Get the parent imagetable model (user or customer).
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
