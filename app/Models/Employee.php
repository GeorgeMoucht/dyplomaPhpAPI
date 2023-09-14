<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $primaryKey = 'employeeNumber';

    protected $fillable = [
        'employeeNumber',
        'lastName',
        'firstName',
        'extension',
        'email',
        'officeCode',
        'reportsTo',
        'jobTitle'
    ];

    // Define relationships
    // An employee that reports to another supervisor employee
    public function supervisor()
    {
        return $this->belongsTo(Employee::class, 'reportsTo', 'employeeNumber');
    }
    
    // An employee that have many employees that report to him
    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'reportsTo', 'employeeNumber');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'salesRepEmployeeNumber', 'employeeNumber');
    }
}