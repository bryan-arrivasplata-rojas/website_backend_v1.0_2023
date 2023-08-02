<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;
class ProfileComponent extends Component
{
    public function render()
    {
        $http = new Http();
        $respuesta = $http -> get('profiles');
        return view('livewire.profile-component',compact('respuesta'));
    }
}
