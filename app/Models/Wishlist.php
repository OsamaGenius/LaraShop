<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    /**
    ** The target Elequant database table
    */ 
    protected $table = 'wishlists';

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
     
    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
