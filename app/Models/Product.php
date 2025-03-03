<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'slug', 'brand_id', 'price', 'stock', 'description', 'image', 'is_active'];

    public  function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public  function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    // slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::updating(function ($product) {

            $product->slug = Str::slug($product->name);
        });
    }
}
