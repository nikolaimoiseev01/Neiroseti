<?php /** @noinspection ALL */

namespace Database\Seeders;

use App\Enums\ActualityEnums;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Test;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $email = ENV('APP_ENV') == ('local') ? 'admin@mail.ru' : ENV('ADMIN_EMAIL');
        $password = ENV('APP_ENV') == ('local') ? '12345678' : ENV('ADMIN_PASSWORD');
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        $modules = [
            [
                'title' => 'Основы нейронных сетей',
                'description' => 'Понимание базовых принципов работы искусственных нейронов',
                'color' => 'bg-gradient-to-br from-cyan-500 to-blue-600',
                'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 4v16M4 12h16M6 6l12 12M6 18L18 6"/>
                </svg>'
            ],
            [
                'title' => 'Как модели учатся',
                'description' => 'Механизмы обучения, градиентный спуск и оптимизация',
                'color' => 'bg-gradient-to-br from-blue-500 to-purple-600',
                'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                </svg>'
            ],
            [
                'title' => 'CNN, RNN, Трансформеры',
                'description' => 'Архитектуры нейронных сетей и их применение',
                'color' => 'bg-gradient-to-br from-purple-500 to-pink-600',
                'icon' => '
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a7.5 7.5 0 10-14.8 0"/>
                </svg>'
            ]
        ];

        foreach ($modules as $key=>$module) {
            $module = Module::create([
                'title' => $module['title'],
                'color' => $module['color'],
                'icon' => $module['icon'],
                'description' => $module['description']
            ]);
            for ($j = 1; $j <= 5; $j++) {
                Lesson::create([
                    'module_id' => $module->id,
                    'title' => "Название урока $j, модуль $key",
                    'description' => "Описание урока $j, модуль $key",
                    'content' => "Контент урока $j, модуль $key",
                ]);
            }
        }


    }
}
