<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLine extends Model
{
    protected $table = 'productlines';

    protected $primaryKey = 'productLine';

    protected $fillable = [
        'productLine',
        'textDescription',
        'htmlDescription',
        'image'
    ];

    // Define relationships
    public function products()
    {
        return $this->hasMany(Product::class, 'productLine', 'productLine');
    }
}