<?php

use Illuminate\Support\Facades\Http;
use MG\Moyasar\Moyasar;

it('test updating the payment', function () {
    $updatedDescription = 'updated description';
    $paymentId = '760878ec-d1d3-5f72-9056-191683f55872';

    Http::fake([
        '*/payments/*' => Http::sequence()->push(['id' => $paymentId, 'status' => 'initiated', 'description' => $updatedDescription]),
    ]);

    $response = (new Moyasar())->update($paymentId);
    expect($response->getData()->response)->toHaveKeys(['description']);
    expect($response->getData()->response)->description->toBe($updatedDescription);
});
