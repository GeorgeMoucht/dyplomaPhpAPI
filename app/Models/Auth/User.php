<?php

namespace App\Models\Auth;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\HasMany;


class User extends Authenticatable implements JWTSubject // Implement JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model
     */
    protected $table = 'users';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    /**
     * Get the indetifier that will be stored in the subject claim of the JWT. 
     * 
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return the key value array, containing any cunstom claim to be added to the JWT.
     * 
     * For example here we will return the permission group of the user.
     * 
     * @return array
    */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the users for the group of permissions.
     */

    public function userHasGroups(): HasMany
    {
        return $this->hasMany(UserHasGroup::class);
    }
}
