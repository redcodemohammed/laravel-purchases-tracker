<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'price', 'qty'];

    protected $casts = [
        'price' => 'integer',
        'qty' => 'integer',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'product_id');
    }
}
