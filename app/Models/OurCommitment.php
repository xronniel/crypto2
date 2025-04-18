<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCommitment extends Model
{
    use HasFactory;

    protected $table = 'our_commitments';

    protected $fillable = [
        'icon',
        'title',
        'text',
        'status',
    ];
}
