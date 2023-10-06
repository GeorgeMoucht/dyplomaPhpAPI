<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserHasGroup extends Model
{
    use HasFactory;

        /**
     * The table associated with the model
     */
    protected $table = 'user_has_ groups';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'group_id',
    ];

    /**
     * Get the permission groups
     * that users has.
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    
    /**
     * Get the user that belongs to this group.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
