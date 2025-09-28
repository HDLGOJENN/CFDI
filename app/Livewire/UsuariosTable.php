<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UsuariosTable extends Component
{
    
    // trae toda la magia de paginación de Livewire (integración con Tailwind incluida).
    use WithPagination;
    // $q: almacena el texto que escribe el usuario en el buscador.
    public string $q = '';        // buscador
    // controla cuantos usuarios se muestran por pagina
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
            //si q no esta vacio se agrega estos filtros
            ->when(trim($this->q) !== '', function ($query) {
                $s = trim($this->q);
                $query->where(function ($q) use ($s) {
                    $q->where('username', 'like', "%{$s}%")
                      ->orWhere('name', 'like', "%{$s}%")
                      ->orWhereHas('account', fn($a) => $a->where('business_name', 'like', "%{$s}%"));
                });
            })
            ->orderBy('name')
            //divide los resultados en paginas
            ->paginate($this->perPage);

        return view('livewire.usuarios-table', [
            'users' => $users,
        ]);
    }
}
