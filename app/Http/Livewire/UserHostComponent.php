<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;
class UserHostComponent extends Component
{
    public function render()
    {
        $http = new Http();
        $respuesta = $http -> get('userhosts');
        return view('livewire.user-host-component',compact('respuesta'));
    }
}
