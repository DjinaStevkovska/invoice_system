<?php

namespace App\Api;

use Symfony\Component\HttpFoundation\JsonResponse;

class BaseApiAction
{
    protected function jsonResponse(array $data, int $statusCode = 200): JsonResponse
    {
        return new JsonResponse($data, $statusCode);
    }

    protected function notFoundResponse(string $message = 'Resource not found'): JsonResponse
    {
        return $this->jsonResponse(['error' => $message], 404);
    }
}
