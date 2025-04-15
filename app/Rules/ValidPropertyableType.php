<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;


class ValidPropertyableType implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the value is a valid class name for propertyable_type
        return in_array($value, [\App\Models\Listing::class, \App\Models\HolidayProperty::class]);
    }

    public function message()
    {
        return 'The :attribute must be a valid property type.';
    }
}