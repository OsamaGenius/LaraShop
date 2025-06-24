<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    /**
    ** The target Elequant database table
    */ 
    protected $table = 'carts';

    /*
    ** The attribs should be filled
    */ 
    protected $fillable = [
        // 
    ];

    /*
    ** The relationship with other tables
    */ 
    public function Users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }
}
