<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class UserTable extends Model
{
    protected $table = "users";

    /**
     * Scope a query to only include popular users.
     */
    public static function scopeEmail($query)
    {
        $query->where('email', 'b2dontcry@gmail.com');
    }
}
