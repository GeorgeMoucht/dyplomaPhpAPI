<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    use HasFactory;

    /**
     * The table associated with this model
     * 
     * @var string
     */
    protected $table = "group_has_permission";

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'group_id',
        'permit_id',
    ];

    /**
     * Define the one-to-many relationship
     * between Groups and group_has_permission tables.
     */
    public function groupPermissions()
    {
        return $this->hasMany(Group::class, 'group_id');
    }
}
