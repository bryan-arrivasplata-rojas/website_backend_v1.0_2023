<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;
class CBUsabilityComponent extends Component
{
    public function render()
    {
        $http = new Http();
        $usability = $http -> get('usabilities');
        return view('livewire.c-b-usability-component',compact('usability'));
    }
}
