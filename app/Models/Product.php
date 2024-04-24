<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    // protected $connection = 'mysql';

    //Permitir mass assignments
    protected $fillable = [
    	'name',
    	'description',
    	'base_price',
    	'base_cost',
        'category_id'
    ];

    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)->withTimestamps();
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
