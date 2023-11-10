<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ListaDeUsuarios extends Component
{
    // recebendo o evento e chamando o metodo vai
    protected $listeners = [
        'user::updated' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.lista-de-usuarios', [
            'users' => User::all()
        ]);
    }
}
