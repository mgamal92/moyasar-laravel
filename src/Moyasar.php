<?php

namespace MG\Moyasar;

use Illuminate\Support\Facades\Http;

class Moyasar
{
    public function pay()
    {
        return Http::asForm()->withHeaders([
            'Authorization' => 'Basic '.base64_encode(config('moyasar-laravel.secret_key')),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->post('https://api.moyasar.com/v1/payments', [
            'amount' => 1000,
            'source' => [
                'company' => 'visa',
                'type' => 'creditcard',
                'name' => 'name',
                'number' => '4111111111111111',
                'cvc' => '123',
                'month' => '03',
                'year' => '30',
            ],
            'callback_url' => 'https://test.com',
        ]);
    }
}
