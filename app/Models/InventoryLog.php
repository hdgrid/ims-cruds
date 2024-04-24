<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryLog extends Model
{
    use HasFactory;
	
    protected $table = 'inventory-logs';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function inventoryMovement()
    {
        return $this->belongsTo(InventoryMovement::class, 'inventory_id');
    }

}
