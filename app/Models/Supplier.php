<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Supplier extends Model
{
    use HasFactory;
    // protected $connection = 'mysql';


    //Permitir mass assignments
    protected $fillable = [
    	'name',
    	'address',
    	'contact_phone'
    ];


    protected $table = 'suppliers';

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

}
