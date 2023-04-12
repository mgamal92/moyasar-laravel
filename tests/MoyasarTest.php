<?php

use MG\Moyasar\Moyasar;
use Symfony\Component\HttpFoundation\Response;

it('test create a new payment', function () {
    $createdPayment = (new Moyasar())->pay();

    expect($createdPayment->status())->toBe(Response::HTTP_CREATED);
    expect($createdPayment->json())->toHaveKeys(['id', 'status', 'source']);
});
