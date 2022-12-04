<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'description', 'user_id', 'categories_id', 'slug'];
    protected $hidden = [];

    public function galleries() {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function category() {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
