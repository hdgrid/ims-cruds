<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryMovement extends Model
{
    use HasFactory;

    protected $table = 'inventory-movements';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}


