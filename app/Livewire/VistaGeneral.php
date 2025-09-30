<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class VistaGeneral extends Component
{
    public array $cuentas = [];

    public function mount(): void
    {
        $this->loadData();
    }

    public function loadData(): void
    {
        // Obtener el usuario autenticado y su cuenta
        $user = Auth::user();
        
        if (!$user || !$user->account_id) {
            $this->cuentas = [];
            return;
        }

        // Obtener solo la cuenta del usuario autenticado
        $cuenta = Account::query()
        ->where('id', $user->account_id)
        ->withCount(['users', 'children'])
        ->select('id', 'business_name', 'account_type', 'account_level')
        ->first();


        if ($cuenta) {
            $this->cuentas = [[
                'nombre'      => $cuenta->business_name,
                'usuarios'    => $cuenta->users_count,
                'subcuentas'  => $cuenta->children_count,
                'tipo_cuenta' => $this->formatTipoCuenta($cuenta->account_type),
                'nivel'       => $this->formatNivel($cuenta->account_level),
            ]];
        } else {
            $this->cuentas = [];
        }
    }

    private function formatTipoCuenta(?string $tipo): string
    {
        return match($tipo) {
            'basico' => 'Básico',
            'intermedio' => 'Intermedio',
            'avanzado' => 'Avanzado',
            default => 'Básico'
        };
    }

    private function formatNivel(?int $nivel): string
    {
        return match($nivel) {
            0 => 'Administrador',
            1 => 'Primer nivel',
            2 => 'Segundo nivel',
            default => '—'
        };
    }

    public function render()
    {
        return view('livewire.vista-general');
    }
}