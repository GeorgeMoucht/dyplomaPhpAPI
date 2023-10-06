<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class UserHasPermission extends Model
{
    use HasFactory;

    /**
     * The table associated with the model
     */
    protected $table = 'user_has_permission';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'permit_id',
    ];

    /**
     * 
     */
    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }

    /**
     * 
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
