<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $primaryKey = 'customerNumber';

    protected $fillable = [
        'customerNumber',
        'checkNumber',
        'paymentDate',
        'amount',
    ];

    // Define relationships
    public function customers()
    {
        return $this->hasMany(Customer::class, 'customerNumber', 'customerNumber');
    }
}