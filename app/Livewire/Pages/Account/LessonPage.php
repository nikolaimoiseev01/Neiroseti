<?php

namespace App\Livewire\Pages\Account;

use App\Models\Lesson;
use Livewire\Component;

class LessonPage extends Component
{
    public $module;
    public $lesson;
    public $isPaid = true;

    public function render()
    {
        return view('livewire.pages.account.lesson-page')->layout('layouts.account');
    }

    public function mount($id) {
        $this->lesson = Lesson::find($id);
        $this->module = $this->lesson->module;
    }
}
