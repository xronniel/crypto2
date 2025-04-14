<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneCode extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'phone_codes';

    // Define the fillable fields
    protected $fillable = [
        'iso',
        'name',
        'iso3',
        'numcode',
        'phonecode',
    ];

    // Disable timestamps if not used
    public $timestamps = false;
}
