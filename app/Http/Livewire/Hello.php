<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Hello extends Component
{
    public ?string $text = '';
    public ?User $user = null;
    protected array $rules = [
        'text' => ['required', 'min:3']
    ];

    public function render()
    {
        return view('livewire.hello', [
            'user' => $this->user
        ]);
    }

    public function boot()
    {
        ray(__METHOD__ . '::' . now()->toString());
    }

    public function booted()
    {
        ray(__METHOD__ . '::' . now()->toString());
    }

    // para dados que vem do banco de dados, sessions
    public function mount()
    {
        $this->user = auth()->user();
    }

    public function hydrate()
    {
        ray(__METHOD__ . '::' . now()->toString());
    }

    public function dehydrate()
    {
        ray(__METHOD__ . '::' . now()->toString());
    }

    public function updating($prop, $value)
    {
        ray(__METHOD__ . '::' . now()->toString());
    }

    public function updated($name, $value)
    {
        $this->validateOnly($name);
        ray(__METHOD__ . '::' . now()->toString());
    }
}
