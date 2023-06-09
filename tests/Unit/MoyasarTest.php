<?php

use Illuminate\Support\Facades\Http;
use MG\Moyasar\Moyasar;

it('test initiating a new payment', function () {
    Http::fake([
        '*/payments' => Http::sequence()->push(['status' => 'initiated', 'amount' => 1000]),
    ]);

    $response = (new Moyasar())->initiate([
        'amount' => 1000,
        'source' => [
            'company' => 'visa',
            'type' => 'creditcard',
            'name' => 'name',
            'number' => '411111111111',
            'cvc' => '123',
            'month' => '03',
            'year' => '30',
        ],
        'callback_url' => 'https://test.com',
    ]);

    expect($response->getData()->response)->toHaveKeys(['status', 'amount']);

});

it('test initiating a new payment with wrong data', function () {
    Http::fake([
        '*/payments' => Http::sequence()->push(['message' => 'Validation Failed']),
    ]);

    $response = (new Moyasar())->initiate([
        'amount' => 1000,
        'source' => [
            'company' => 'visa',
            'type' => 'creditcard',
            'name' => 'name',
            'number' => '1212',
            'cvc' => '123',
            'month' => '03',
            'year' => '30',
        ],
        'callback_url' => 'https://test.com',
    ]);

    expect($response->getData()->response)->toHaveKeys(['message']);
});
