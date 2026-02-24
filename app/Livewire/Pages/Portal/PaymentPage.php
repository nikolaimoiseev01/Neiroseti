<?php

namespace App\Livewire\Pages\Portal;

use App\Enums\TransactionTypeEnums;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Transaction;
use App\Notifications\SuccessPaymentNotification;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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

    public function createPayment()
    {
        if(Auth::check()) {

            $paymentService = new PaymentService();
            $userId = Auth::user()->id;
            $description = "Покупка полного доступа 'Нейросети-просто' (user_id=$userId)";
            $transactionData = [
                'type' => TransactionTypeEnums::FULL_ACCESS->value,
                'description' => $description,
            ];
            $urlRedirect = route('account.dashboard')  . '?confirm_payment=full_access_granted';
            $paymentUrl = $paymentService->createPayment(
                amount: Transaction::FULL_ACCESS_PRICE,
                urlRedirect: $urlRedirect,
                transactionData: $transactionData
            );
            $this->redirect($paymentUrl);
        } else {
            $this->redirect('login', navigate: true);
        }
    }
}
