<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UsuariosTable extends Component
{
    use WithPagination;

    public string $q = '';        // buscador
    public int $perPage = 10;     // por página

    // cuando cambia el buscador, vuelve a la página 1
    public function updatedQ(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::query()
            ->with('account') // para mostrar nombre de la cuenta
            ->when(trim($this->q) !== '', function ($query) {
                $s = trim($this->q);
                $query->where(function ($q) use ($s) {
                    $q->where('username', 'like', "%{$s}%")
                      ->orWhere('name', 'like', "%{$s}%")
                      ->orWhereHas('account', fn($a) => $a->where('business_name', 'like', "%{$s}%"));
                });
            })
            ->orderBy('name')
            ->paginate($this->perPage);

        return view('livewire.usuarios-table', [
            'users' => $users,
        ]);
    }
}
