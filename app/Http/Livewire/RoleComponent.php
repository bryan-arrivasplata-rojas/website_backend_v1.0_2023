<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;
class RoleComponent extends Component
{
    public function render()
    {
        $http = new Http();
        $respuesta = $http -> get('roles');
        return view('livewire.role-component',compact('respuesta'));
    }
}
