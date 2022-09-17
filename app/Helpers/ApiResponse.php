<?php

namespace App\Helpers;

use Illuminate\Http\Exceptions\HttpResponseException;

class ApiResponse
{
    const KEY_SUCCESS = 'success';

    const KEY_DATA = 'data';

    const KEY_MESSAGE = 'message';

    public function success(mixed $data, $status = 200): void
    {
        $this->successRespond($data, $status);
    }

    public function failed(string $message, $status = 400): void
    {
        $this->failedRespond($message, $status);
    }

    public function failedValidation(mixed $data): void
    {
        $this->failedRespond($data, 422);
    }

    public function failedAuthorization(string $message): void
    {
        $this->failedRespond($message, 403);
    }

    public function failedAuthentication(string $message): void
    {
        $this->failedRespond($message, 401);
    }

    public function failedNotFound(string $message): void
    {
        $this->failedRespond($message, 404);
    }

    private function successRespond(mixed $data, int $status): void
    {
        $this->respondAsApi([
            self::KEY_SUCCESS => true,
            self::KEY_DATA => $data,
        ], $status);
    }

    private function failedRespond(string $message, int $status): void
    {
        $this->respondAsApi([
            self::KEY_SUCCESS => false,
            self::KEY_MESSAGE => $message,
        ], $status);
    }

    private function respondAsApi($response, $status = 200, array $headers = [], $options = 0)
    {
        throw new HttpResponseException(response()->json($response, $status, $headers, $options));
    }
}
