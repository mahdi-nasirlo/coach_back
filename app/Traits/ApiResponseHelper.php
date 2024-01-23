<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use function response;

trait ApiResponseHelper
{
    public function respondWithSuccess($data = [], ?string $message = null): JsonResponse
    {
        return response()->json([
            "success" => true,
            "message" => $message ?? "successfully operation",
            "data" => $data
        ]);
    }
}
