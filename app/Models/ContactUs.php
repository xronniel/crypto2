<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';
    
    protected $fillable = [
        'address',
        'map',
        'emails',
        'contacts',
        'address_icon',
        'contact_icon',
        'email_icon',
    ];
}
