<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class Controller
{
    public function created(JsonResource|Model $data, string $message = 'Successfully created!'): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'statusCode' => 201, // 'Created
            'data' => $data,
        ], 201);
    }

    public function updated(JsonResource|Model $data, string $message = 'Successfully updated!'): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'statusCode' => 200, // 'OK'
            'data' => $data,
        ]);
    }

    public function deleted(): JsonResponse
    {
        return response()->json([], 204); // 'No Content'
    }

    public function success(string $message, mixed $data = [], int $code = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'statusCode' => $code,
            'data' => $data,
        ], $code);
    }

    public function failed(string $message = 'Failed', int $code = 400): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'statusCode' => $code,
        ], $code);
    }
}
