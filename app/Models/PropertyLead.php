<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'message',
        'source_page',
        'property_ref_no',
    ];
    
}
