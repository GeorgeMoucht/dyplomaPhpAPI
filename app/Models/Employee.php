<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $primaryKey = 'employeeNumber';

    protected $fillable = [
        'lastName',
        'firstName',
        'extension',
        'email',
        'officeCode',
        'reportsTo',
        'jobTitle'
    ];

    public function office()
    {
        return $this->belongsTo(Office::class, 'officeCode', 'officeCode');
    }


    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'reportsTo', 'employeeNumber');
    }

    public function supervisor()
    {
        return $this->belongsTo(Employee::class, 'reportsTo', 'employeeNumber');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'salesRepEmployeeNumber', 'employeeNumber');
    }
}