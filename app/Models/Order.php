<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'orderNumber';

    protected $fillable = [
        'orderNumber',
        'orderDate',
        'requiredDate',
        'shippedDate',
        'status',
        'comments',
        'customerNumber',
    ];

    // Define relationships
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'orderNumber', 'orderNumber');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'customerNumber', 'customerNumber');
    }
}