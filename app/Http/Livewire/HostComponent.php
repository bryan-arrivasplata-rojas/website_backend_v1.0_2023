<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;
class HostComponent extends Component
{
    public function render()
    {
        $http = new Http();
        $respuesta = $http -> get('hosts');
        return view('livewire.host-component',compact('respuesta'));
    }
}
