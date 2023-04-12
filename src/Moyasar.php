<?php

namespace MG\Moyasar;

class Moyasar
{
    const BASE_URL = 'https://api.moyasar.com/v1/';

    private function headers(): array
    {
        return [
            'Authorization' => 'Basic '.base64_encode(config('moyasar-laravel.secret_key')),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }
}
