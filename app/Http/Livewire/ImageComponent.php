<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;
class ImageComponent extends Component
{
    public function render()
    {
        $http = new Http();
        $respuesta = $http -> get('images');
        return view('livewire.image-component',compact('respuesta'));
    }
}
