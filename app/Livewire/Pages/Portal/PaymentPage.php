<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Lesson;
use App\Models\Module;
use Livewire\Component;
use PhpParser\Node\Expr\AssignOp\Mod;

class PaymentPage extends Component
{
    public $modules;
    public $totalLessons;
    public function render()
    {
        return view('livewire.pages.portal.payment-page')->layout('layouts.portal');
    }

    public function mount() {
        $this->modules = Module::count();
        $this->totalLessons = Lesson::count();
    }
}
