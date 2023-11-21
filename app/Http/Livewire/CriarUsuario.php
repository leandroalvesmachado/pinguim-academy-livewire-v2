<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Rules\CustomRule;
use Livewire\Component;

class CriarUsuario extends Component
{
    public ?string $name = null;
    public ?string $email = null;
    public bool $saving = false;

    // assim não funciona quando precisa utilizar uma regra personalizada, no caso a classe CustomRule
    // protected array $rules = [
    //     'name' => ['required', 'max:255'],
    //     'email' => ['required', 'max:255', 'email', new CustomRule()]
    // ];

    public function render()
    {
        return view('livewire.criar-usuario');
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', new CustomRule()]
        ];
    }

    public function save()
    {
        $this->saving = true;
        sleep(2);

        // utiliza as regras da variavel $rules
        $this->validate();

        if ($this->name == 'Leandro') {
            $this->addError('name', 'Essa nome não é bom');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => 'P@ssword',
        ]);

        $this->emit('user::created');
        $this->reset('name', 'email');
    }
}
