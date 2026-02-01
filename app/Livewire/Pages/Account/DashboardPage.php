<?php

namespace App\Livewire\Pages\Account;

use App\Models\Module;
use Livewire\Component;

class DashboardPage extends Component
{
    public $isPaid = false;
    public $modules;
    public $stats;

    public function render()
    {
        return view('livewire.pages.account.dashboard-page')->layout('layouts.account');
    }

    public function mount() {
        $this->stats = [
            [
                'name' => 'Модулей',
                'value' => 1,
                'color' => 'text-cyan-400'
            ],
            [
                'name' => 'Уроков',
                'value' => 1,
                'color' => 'text-purple-400'
            ],
            [
                'name' => 'Прогресс',
                'value' => 1,
                'color' => 'text-blue-400'
            ],
            [
                'name' => 'Доступно',
                'value' => 1,
                'color' => 'text-pink-400'
            ]
        ];
        $this->modules = Module::with('lessons')->get();
    }
}
