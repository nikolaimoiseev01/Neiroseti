<?php

namespace App\Livewire\Pages\Account;

use App\Models\Transaction;
use Livewire\Component;

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SettingsPage extends Component
{

    public string $name = 'Пользователь';
    public string $email = 'user@example.com';
    public bool $isPaid = true;

    public $transactions;

    public function render()
    {
        return view('livewire.pages.account.settings-page')->layout('layouts.account');
    }

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->isPaid = $user->is_full_access;

        if ($this->isPaid) {
            $this->transactions = Transaction::where('user_id', Auth::id())->get();
        }
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // 🔥 здесь сохранение пользователя
         auth()->user()->update([
             'name' => $this->name,
             'email' => $this->email,
         ]);

        $this->dispatch('profile-saved');
    }



}
