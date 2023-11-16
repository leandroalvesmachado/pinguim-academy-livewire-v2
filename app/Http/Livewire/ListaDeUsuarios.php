<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class ListaDeUsuarios extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public ?string $search = null;
    public ?string $searchEmail = null;
    public ?string $sortBy = null;
    public ?string $sortDir = 'asc';
    public ?int $limit = 5;

    // recebendo o evento e chamando o metodo vai
    protected $listeners = [
        'user::updated' => '$refresh'
    ];

    // gera o link da pesquisa
    protected $queryString = [
        'search' => ['except' => '', 'as' => 'q'],
        'searchEmail' => ['except' => '', 'as' => 'eq'],
        'limit' => ['except' => '5', 'as' => 'l'],
        'sortBy' => ['except' => ''],
        'sortDir' => ['except' => 'asc']
    ];

    public function mount()
    {
        $this->authorize('users::list');
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.lista-de-usuarios', [
            'users' => User::query()
                ->when($this->search, fn(Builder $q) => $q->where('name', 'like', '%' . $this->search . '%'))
                ->when($this->searchEmail, fn(Builder $q) => $q->where('email', 'like', '%' . $this->searchEmail . '%'))
                ->when($this->sortBy, fn(Builder $q) => $q->orderBy($this->sortBy, $this->sortDir))
                ->paginate($this->limit)
        ]);
    }

    public function sort($column)
    {
        $this->sortDir = $this->sortBy == $column
            ? ($this->sortDir == 'asc' ? 'desc' : 'asc') // toggle direction
            : 'asc';

        $this->sortBy = $column;
    }
}
