<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone',
        'birthday'
    ];

    /**
     * Get customer pagination data
     *
     * @param array $filter
     * 
     * @return void
     */
    public function getList($filter = [])
    {
        //Get page
        $page = $filter['page'] ?? 1;
        //Get perpage
        $perpage = $filter['perpage'] ?? 10;

        if (empty($filter['search'])) {
            $filter['search'] = '';
        }

        return $this
            ->where("full_name", 'like', '%' . $filter['search'] . '%')
            ->orderBy("{$this->table}.id", "desc")
            ->paginate($perpage, $columns = ['*'], $pageName = 'page', $page);
    }

    /**
     * Get the profiles for the customer.
     */
    public function profiles()
    {
        return $this->hasMany(Profiles::class, 'customer_id');
    }

    /**
     * Get all of the customers's images
     */
    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
}
