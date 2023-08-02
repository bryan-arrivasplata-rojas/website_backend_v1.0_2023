<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;
class FileComponent extends Component
{
    public function render()
    {
        $http = new Http();
        $respuesta = $http -> get('files');
        return view('livewire.file-component',compact('respuesta'));
    }
}
