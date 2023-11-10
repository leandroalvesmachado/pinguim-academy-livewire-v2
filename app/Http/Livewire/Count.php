<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Count extends Component
{
    // propriedades
    public ?string $name = 'Teste';

    public function render()
    {
        return view('livewire.count', [
            'users' => \App\Models\User::all()
        ]);
    }

    // propriedades computadas
    public function getLastNameProperty(): string
    {
        return 'Leandro';
    }

    public function toggle()
    {
        if ($this->name[0] == str($this->name[0])->upper()->toString()) {
            $this->name = str($this->name)->lower();
        } else {
            $this->name = str($this->name)->upper();
        }
    }

    public function toggleComParametro(string $type)
    {
        if ($type == 'LOWER') {
            $this->name = str($this->name)->lower();
        } else {
            $this->name = str($this->name)->upper();
        }
    }

    public function submit()
    {
        \App\Models\User::factory()->create([
            'name' => $this->name,
            'password' => bcrypt('P@ssword'),
        ]);
    }

    public function send()
    {
        // classe, metodo e variaveis
        $this->emitTo(Todo::class, 'mudaai', $this->name);
    }
}
