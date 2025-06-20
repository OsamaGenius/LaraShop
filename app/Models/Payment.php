<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
    ** The target Elequant database table
    */ 
    protected $table = 'payments';

    /*
    ** The attribs should be filled
    */ 
    protected $fillable = [
        // 
    ];

    /*
    ** The relationship with other tables
    */ 
}
