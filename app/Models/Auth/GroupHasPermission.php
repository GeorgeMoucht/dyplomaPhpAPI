<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class GroupHasPermission extends Model
{
    use HasFactory;

    /**
     * The table associated with the model
     */
    protected $table = 'group_has_permission';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'group_id',
        'permit_id',
    ];

    
    public function permission(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
