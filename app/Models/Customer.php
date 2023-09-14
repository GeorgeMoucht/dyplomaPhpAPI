<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $primaryKey = 'customerNumber';

    protected $fillable = [
        'customerName',
        'contactLastName',
        'contactFirstName',
        'phone',
        'addressLine1',
        'addressLine2',
        'city',
        'state',
        'postalCode',
        'country',
        'salesRepEmployeeNumber',
        'creditLimit',
    ];

    // Define relationships
    public function orders()
    {
        return $this->hasMany(Order::class, 'customerNumber', 'customerNumber');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'customerNumber', 'customerNumber');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'salesRepEmployeeNumber', 'employeeNumber');
    }
}