<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userPermission extends Model
{
    use HasFactory;

    /**
     * The table associated with this model
     * 
     * @var string
     */
    protected $table = "user_has_permission";


    /**
     * The attributes that are mass assignable
     * 
     * @var array
     * 
     */
    protected $fillable = [
        'user_id',
        'permit_id',
    ];


}
