<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
    ** The target Elequant database table
    */ 
    protected $table = 'order_items';

    /*
    ** The attribs should be filled
    */ 
    protected $fillable = [
        // 
    ];

    /*
    ** The relationship with other tables
    */
    public function Order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
     
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
