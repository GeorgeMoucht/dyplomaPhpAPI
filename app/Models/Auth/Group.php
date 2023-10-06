<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    /**
     * The table associated with the model
     */
    protected $table = 'groups';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'groupName',
        'created_at',
        'updated_at',
    ];


    /**
     * Get the users for the group of permissions.
     */

    public function userHasGroups(): HasMany
    {
        return $this->hasMany(UserHasGroup::class);
    }
}
