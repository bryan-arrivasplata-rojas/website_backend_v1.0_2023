<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;
class UserComponent extends Component
{
    public function render()
    {
        $http = new Http();
        $respuesta = $http -> get('users');
        return view('livewire.user-component',compact('respuesta'));
    }
}
