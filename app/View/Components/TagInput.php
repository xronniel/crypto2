<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TagInput extends Component
{
    public $existingTags;
    public $tags;
    public $name;
    public $label;
    public $id;

    public function __construct($existingTags = [], $tags = [], $name = 'tags', $label = 'Tags', $id = 'tags')
    {
        $this->existingTags = $existingTags;
        $this->tags = $tags;
        $this->name = $name;
        $this->label = $label;
        $this->id = $id;
    }

    public function render()
    {
        return view('components.tag-input');
    }
}
