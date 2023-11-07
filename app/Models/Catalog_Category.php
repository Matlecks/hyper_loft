<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalog_Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'catalog__categories';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');

    }
}
