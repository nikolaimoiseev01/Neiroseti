<?php

namespace App\Services\CallbackPaymentServices;


use App\Models\User;
use App\Notifications\SuccessPaymentNotification;
use Illuminate\Support\Facades\Notification;

class FullAccessPaymentService
{
    private array $yooKassaObject;

    public function __construct(array $yooKassaObject)
    {
        $this->yooKassaObject = $yooKassaObject;
    }

    public function update()
    {
        User::where('id', $this->yooKassaObject['metadata']['user_id'])->update([
            'is_full_access' => true,
        ]);
        Notification::send(new class {}, new SuccessPaymentNotification());
    }
}
