<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $table = 'offices';

    protected $primaryKey = 'officeCode';

    protected $fillable = [
        'city',
        'phone',
        'addressLine1',
        'addressLine2',
        'state',
        'country',
        'postalCode',
        'territory'
    ];

    // Define relationships
    public function employees()
    {
        return $this->hasMany(Employee::class, 'officeCode', 'officeCode');
    }
}