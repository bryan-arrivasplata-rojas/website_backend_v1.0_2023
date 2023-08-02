<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;
class CBUsuarioComponent extends Component
{
    public function render()
    {
        $http = new Http();
        $userhost = $http -> get('userhosts');
        return view('livewire.c-b-usuario-component',compact('userhost'));
    }
}
