<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ["id"];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}
