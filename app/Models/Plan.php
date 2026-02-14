<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    /** @use HasFactory<\Database\Factories\PlanFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'budget',
    ];

    public function owner() : BelongsTo {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function members() : BelongsToMany
    {
        return $this->BelongsToMany(User::class, 'plan_user')
            ->withTimestamps();
    }

    public function transactions() : HasMany {
        return $this->hasMany(Transaction::class);
    }
}
