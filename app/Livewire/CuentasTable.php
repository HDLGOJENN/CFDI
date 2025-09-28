<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Account;

class CuentasTable extends Component
{
    use WithPagination;

    public string $q = '';        // buscador
    public int $perPage = 10;     // registros por página

    public function updatedQ(): void
    {
        // cada vez que cambia el buscador, vuelve a la primera página
        $this->resetPage();
    }

    public function render()
    {
        $accounts = Account::query()
            ->with('parent') // relación para mostrar cuenta madre
            ->when(trim($this->q) !== '', function ($query) {
                $s = trim($this->q);
                $query->where(function ($q) use ($s) {
                    $q->where('business_name', 'like', "%{$s}%")
                      ->orWhere('email', 'like', "%{$s}%")
                      ->orWhereHas('parent', fn($p) => $p->where('business_name', 'like', "%{$s}%"));
                });
            })
            ->orderBy('business_name')
            ->paginate($this->perPage);

        return view('livewire.cuentas-table', [
            'accounts' => $accounts,
        ]);
    }
}
