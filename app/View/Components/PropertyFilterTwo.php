<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PropertyFilterTwo extends Component
{
    public $propertyTypes, $priceRange, $noOfRooms, $noOfBathrooms;

    public function __construct($propertyTypes, $priceRange, $noOfRooms, $noOfBathrooms)
    {
        $this->propertyTypes = $propertyTypes;
        $this->priceRange = $priceRange;
        $this->noOfRooms = $noOfRooms;
        $this->noOfBathrooms = $noOfBathrooms;
    }

    public function render(): View|Closure|string
    {
        return view('components.property-filter-two');
    }
}


