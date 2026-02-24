<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\PaymentController;
use App\Livewire\Pages\Account\DashboardPage;
use App\Livewire\Pages\Account\LessonPage;
use App\Livewire\Pages\Account\SettingsPage;
use App\Livewire\Pages\Auth\ConfirmPasswordPage;
use App\Livewire\Pages\Auth\ForgotPasswordPage;
use App\Livewire\Pages\Auth\LoginPage;
use App\Livewire\Pages\Auth\RegisterPage;
use App\Livewire\Pages\Auth\ResetPasswordPage;
use App\Livewire\Pages\Auth\VerifyEmailPage;
use App\Livewire\Pages\Portal\IndexPage;
use App\Livewire\Pages\Portal\PaymentPage;
use Illuminate\Support\Facades\Route;


//region Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('register', RegisterPage::class)
        ->name('register');

    Route::get('login', LoginPage::class)
        ->name('login');

    Route::get('forgot-password', ForgotPasswordPage::class)
        ->name('auth.password.request');

    Route::get('reset-password/{token}', ResetPasswordPage::class)
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', VerifyEmailPage::class)
        ->name('auth.verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('auth.verification.verify');

    Route::get('confirm-password', ConfirmPasswordPage::class)
        ->name('auth.password.confirm');
});
//endregion Auth


Route::get('/', IndexPage::class)->name('portal.index');
Route::get('/payment', PaymentPage::class)->name('portal.payment');

Route::post('/logout', function () {
    auth()->logout();

    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

Route::middleware('auth')->prefix('account')->group(function () {
    Route::get('dashboard', DashboardPage::class)->name('account.dashboard');
    Route::get('lesson/{id}', LessonPage::class)->name('account.lesson');
    Route::get('settings', SettingsPage::class)->name('account.settings');
});

Route::match(['POST', 'GET'], '/payments/callback', [PaymentController::class, 'callback']);
