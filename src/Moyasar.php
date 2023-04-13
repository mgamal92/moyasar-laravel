<?php

namespace MG\Moyasar;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class Moyasar
{
    public const BASE_URL = 'https://api.moyasar.com/v1/';

    private function headers(): array
    {
        return [
            'Authorization' => 'Basic ' . base64_encode(config('moyasar-laravel.secret_key')),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }

    public function initiate($data): Response
    {
        try {
            return Http::asForm()
                ->withHeaders($this->headers())
                ->post(self::BASE_URL . 'payments', $data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}
