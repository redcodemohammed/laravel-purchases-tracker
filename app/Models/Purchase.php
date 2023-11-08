<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';

    protected $fillable = ['customer_name'];

    public function items()
    {
        return $this->hasMany(Item::class, 'purchase_id');
    }
}
