<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
    ** The target Elequant database table
    */ 
    protected $table = 'orders';

    /*
    ** The attribs should be filled
    */ 
    protected $fillable = [
        // 
    ];

    /*
    ** The relationship with other tables
    */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function OrderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
