<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post',
        'image',
        'price',
        'user_id',
        'category_id'
    ];

    // The admin who uploaded the product
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Orders for this product
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Category of the product
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}