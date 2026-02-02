<?php

namespace App\Livewire\Pages\Account;

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

    public array $transactions = [];

    public function render()
    {
        return view('livewire.pages.account.settings-page')->layout('layouts.account');
    }

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;

        if ($this->isPaid) {
            $this->transactions = [
                [
                    'id' => '1',
                    'date' => '2026-02-02',
                    'description' => 'Полный доступ к платформе AI Knowledge',
                    'amount' => '100 ₽',
                    'status' => 'completed',
                ],
            ];
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
