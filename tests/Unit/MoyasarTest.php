<?php

use Illuminate\Support\Facades\Http;
use MG\Moyasar\Moyasar;
use Symfony\Component\HttpFoundation\Response;

it('test initiating a new payment', function () {
    Http::fake([
        '*/payments' => Http::response(['status' => 'initiated', Response::HTTP_CREATED]),
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

    expect($response->json())->toHaveKeys(['status']);

});

it('test initiating a new payment with wrong data', function () {
    Http::fake([
        '*/payments' => Http::response(['message' => 'Validation Failed'], Response::HTTP_BAD_REQUEST),
    ]);

    $response = (new Moyasar())->initiate([
        'amount' => 1000,
        'source' => [
            'company' => 'visa',
            'type' => 'creditcard',
            'name' => 'name',
            'number' => '1010101010',
            'cvc' => '123',
            'month' => '03',
            'year' => '30',
        ],
        'callback_url' => 'https://test.com',
    ]);

    expect($response->json())->toHaveKeys(['message']);

});
