<?php

use App\Http\Controllers\PaymentController;

Route::post('/payments/callback', [PaymentController::class, 'callback']);
