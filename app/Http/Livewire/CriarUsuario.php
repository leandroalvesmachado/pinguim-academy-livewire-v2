<?php

namespace App\Http\Livewire;

use App\Rules\CustomRule;
use Livewire\Component;

class CriarUsuario extends Component
{
    public ?string $name = null;
    public ?string $email = null;

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
        // utiliza as regras da variavel $rules
        $this->validate();

        if ($this->name == 'Leandro') {
            $this->addError('name', 'Essa nome não é bom');
        }
    }
}
