<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    /**
    ** The target Elequant database table
    */ 
    protected $table = 'cart_items';

    /*
    ** The attribs should be filled
    */ 
    protected $fillable = [
        // 
    ];

    /*
    ** The relationship with other tables
    */ 
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
