<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditarUsuario extends Component
{
    public ?User $user = null;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.editar-usuario');
    }

    public function edit()
    {
        $this->user->name = fake()->name;
        $this->user->save();

        $this->emitUp('user::updated');
    }
}
