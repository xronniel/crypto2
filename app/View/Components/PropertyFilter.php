<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PropertyFilter extends Component
{
    public $propertyTypes, $plotAreaRange, $priceRange, $amenities;

    public function __construct($propertyTypes, $plotAreaRange, $priceRange, $amenities)
    {
        $this->propertyTypes = $propertyTypes;
        $this->plotAreaRange = $plotAreaRange;
        $this->priceRange = $priceRange;
        $this->amenities = $amenities;
    }
    

    public function render(): View|Closure|string
    {
        return view('components.property-filter');
    }
}
