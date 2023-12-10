<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchIndex extends Model
{
    protected $table = 'search_indixes';
    protected $fillable = ['search_key','tags','table','item_id','url'];

    use HasFactory;
}
