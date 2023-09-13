<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orderdetails';

    protected $primaryKey = 'orderNumber';

    protected $fillable = [
        'orderNumber',
        'productCode',
        'quantityOrdered',
        'priceEach',
        'orderLineNumber',
    ];

    // Define relationships
    public function orders()
    {
        return $this->hasMany(Order::class, 'orderNumber', 'orderNumber');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'productCode', 'productCode');
    }
}