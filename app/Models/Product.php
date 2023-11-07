<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    public function categories()
    {
        return $this->belongsToMany(Catalog_Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'product_shops', 'product_id', 'shop_id');
    }

    public static function getActiveAndInactiveColumns()
    {
        $table_name = 'products';

        $tableSetting = TableSetting::where('table_name', $table_name)->first();

        $columns = json_decode($tableSetting->settings ?? $tableSetting->default)->data;

        $all_default_columns = json_decode($tableSetting->default)->data;

        usort($columns, function ($a, $b) {
            return $a->sort - $b->sort;
        });

        $all_columns = array_column($all_default_columns, 'column_name');
        $active_columns = array_column($columns, 'column_name');
        $inactive_columns = array_diff($all_columns, $active_columns);

        return [
            'active_columns' => $active_columns,
            'inactive_columns' => $inactive_columns,
            'columns' => $columns,
        ];
    }
}
