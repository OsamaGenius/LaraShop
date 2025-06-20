<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
    ** The target Elequant database table
    */ 
    protected $table = 'categories';

    /*
    ** The attribs should be filled
    */ 
    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    /*
    ** The relationship with other tables
    */ 
    public function Product(): HasMany
    {
        return $this->hasMany(Product::class, 'cate_id', 'id');
    }
}
