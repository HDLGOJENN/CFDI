<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Account;

class VistaGeneral extends Component
{
    //$cuentas guardará los datos de cuentas que luego vas a mostrar en la tabla.
    public array $cuentas = [];
    //$q es el texto que el usuario escribe en el buscador.
    public string $q = '';

    public function mount(): void
    {
        //Llama a loadData() para traer las cuentas desde la base de datos y mostrarlas desde el inicio.
        $this->loadData();
    }

    // Hook genérico: se ejecuta cuando cambia cualquier propiedad
    public function updated(string $name, $value): void
    {
        if ($name === 'q') {
            $this->loadData();
        }
    }

    //para hacer consulta a la tabla usuarios
    public function loadData(): void
    {
        //Incluye el conteo de usuarios (withCount('users')).
        $query = Account::query()->withCount('users');
        //si no buscamos nada entonces se filtra por business_name
        if (trim($this->q) !== '') {
            $query->where('business_name', 'like', '%'.trim($this->q).'%');
        }
        //Selecciona solo ciertos campos, ordena por nombre, limita a 50 resultados.
        $this->cuentas = $query
            ->select('id','business_name','account_level')
            ->orderBy('business_name')
            ->take(50)
            ->get()
            ->map(fn($a) => [
                'nombre'   => $a->business_name,
                'usuarios' => $a->users_count,
                'nivel'    => $a->account_level ?? '—',
            ])->toArray();
    }
    //Livewire se encarga de pasarle las propiedades ($cuentas, $q) automáticamente a la vista.
    public function render()
    {
        return view('livewire.vista-general');
    }
}
