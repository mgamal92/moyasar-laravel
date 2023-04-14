<?php

namespace MG\Moyasar;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class Moyasar
{
    public const BASE_URL = 'https://api.moyasar.com/v1/';

    private function headers(): array
    {
        return [
            'Authorization' => 'Basic '.base64_encode(config('moyasar-laravel.secret_key')),
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
    }

    public function initiate($data): JsonResponse
    {
        try {
            $response = Http::asForm()
                ->withHeaders($this->headers())
                ->post(self::BASE_URL.'payments', $data);

            return response()->json([
                'response' => $response->json(),
                'status' => $response->status(),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }


    public function update($paymentId): JsonResponse
    {
        try {
            $response = Http::withHeaders($this->headers())->put(self::BASE_URL.'payments/'.$paymentId);

            return response()->json([
                'response' => $response->json(),
                'status' => $response->status(),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }
}
