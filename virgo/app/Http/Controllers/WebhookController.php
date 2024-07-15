<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class WebhookController extends CashierController
{
    public function handleWebhook(Request $request)
    {
        // Log webhook events for debugging
        Log::info('Stripe Webhook Event Received', ['event' => $request->all()]);

        return parent::handleWebhook($request);
    }
}
