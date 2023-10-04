<?php

namespace App\Models\Auth;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    /**
     * The table associated with this model
     * 
     * @var string
     */
    protected $table = "user_has_group";

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     * 
     */
    protected $fillable = [
        'user_id',
        'group_id',
    ];

    /**
     * Get the user associated with the UserGroup
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
