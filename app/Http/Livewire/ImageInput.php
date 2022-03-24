<?php

namespace App\Http\Livewire;

use Livewire\Component;


class ImageInput extends Component
{
    public $image = null;
    public function render()
    {
        return view('livewire.image-input');
    }
}
