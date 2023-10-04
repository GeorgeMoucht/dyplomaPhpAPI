<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * The table associated with this model.
     *
     * @var string
     */
    protected $table = "groups";
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'group_id',
        'groupName',
    ];

    /**
     * Define the one-to-many relationship 
     * between Group and UserGroup.
     */
    public function userGroups()
    {
        return $this->hasMany(UserGroup::class, 'group_id');
    }
}
