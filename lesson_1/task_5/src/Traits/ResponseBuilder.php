<?php

namespace App\task5\Traits;

trait ResponseBuilder
{
    public function getResponse(array|string $data, bool $status, int $code): string{
//        header('Content-Type: application/json');
        http_response_code($code);
        return json_encode([
            'success' => $status,
            'data' => $data,
            'code' => $code
        ], JSON_UNESCAPED_UNICODE);
    }
}