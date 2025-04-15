<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class UserContactedProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'propertyable_id',
        'propertyable_type',
        'property_ref_no',
        'source_page',
        'contacted_through',
    ];

    public function propertyable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the user who contacted the property
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
