<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Permission extends Model
{
    use HasFactory;

    /**
     * The table associated with the model
     */
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'permName',
    ];

    public function userHasPermissions(): HasMany
    {
        return $this->hasMany(UserHasPermissions::class);
    }

    public function groupHasPermissions(): HasMany
    {
        return $this->hasMany(GroupHasPermission::class);
    }
}
