<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;
class UsabilityComponent extends Component
{
    public function render()
    {
        $http = new Http();
        $respuesta = $http -> get('usabilities');
        return view('livewire.usability-component',compact('respuesta'));
    }
}
