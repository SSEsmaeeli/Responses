<?php

namespace App\Helpers;

use Illuminate\Http\Exceptions\HttpResponseException;

class ApiResponse
{
    const KEY_SUCCESS = 'success';
    const KEY_DATA = 'data';
    const KEY_MESSAGE = 'message';

    public function success($data, $status = 200): void
    {
        $this->successRespond($data, $status);
    }

    public function failed($message, $status = 400): void
    {
        $this->failedRespond($message, $status);
    }

    public function failedValidation($data): void
    {
        $this->failedRespond($data, 422);
    }

    public function failedAuthorization($message): void
    {
        $this->failedRespond($message, 403);
    }

    public function failedAuthentication($message): void
    {
        $this->failedRespond($message, 401);
    }

    public function failedNotFound($message): void
    {
        $this->failedRespond($message, 404);
    }

    private function successRespond($data, $status)
    {
        $this->respondAsApi([
            self::KEY_SUCCESS => true,
            self::KEY_DATA => $data
        ], $status);
    }

    private function failedRespond($message, $status)
    {
        $this->respondAsApi([
            self::KEY_SUCCESS => false,
            self::KEY_MESSAGE => $message
        ], $status);
    }

    private function respondAsApi($response, $status = 200, $headers = [], $options = 0)
    {
        throw new HttpResponseException(response()->json($response, $status, $headers, $options));
    }
}
