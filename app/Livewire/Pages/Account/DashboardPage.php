<?php

namespace App\Livewire\Pages\Account;

use App\Models\Lesson;
use App\Models\Module;
use Livewire\Component;

class DashboardPage extends Component
{
    public $isPaid = true;
    public $modules;
    public $stats;

    public function render()
    {
        return view('livewire.pages.account.dashboard-page')->layout('layouts.account');
    }

    public function mount() {
        $this->modules = Module::query()
            ->with(['lessons' => function ($query) {
                $query->orderBy('order');
            }])
            ->orderBy('order')
            ->get();
        $this->stats = [
            [
                'name' => 'Модулей',
                'value' => count($this->modules),
                'color' => 'text-cyan-400'
            ],
            [
                'name' => 'Уроков',
                'value' => Lesson::count(),
                'color' => 'text-purple-400'
            ],
            [
                'name' => 'Прогресс',
                'value' => 1,
                'color' => 'text-cyan-400'
            ],
            [
                'name' => 'Доступно',
                'value' => 1,
                'color' => 'text-purple-400'
            ]
        ];
    }
}
