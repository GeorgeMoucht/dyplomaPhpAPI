<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $primaryKey = 'customerNumber';

    protected $fillable = [
        'checkNumber',
        'paymentDate',
        'amount',
    ];

    // Define relationships
    public function customer()
    {
        return $this->hasMany(Customer::class, 'customerNumber', 'customerNumber');
    }
}