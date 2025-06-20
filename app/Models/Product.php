<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /**
    ** The target Elequant database table
    */ 
    protected $table = 'products';

    /*
    ** The attribs should be filled
    */ 
    protected $fillable = [
        'name',
        'cate_id',
        'stock_quant',
        'price',
        'file',
        'description'
    ];

    /*
    ** The relationship with other tables
    */ 
    public function Wishlist(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }
     
    public function CartItem(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }
     
    public function OrderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
     
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }
}
