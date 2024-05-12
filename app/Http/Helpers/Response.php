<?php
namespace App\Http\Helpers;

class Response
{
    /**
     * @param string $message
     * @param array<string, mixed> $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success(string $message, $data = [], int $status = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * @param string $message
     * @param array<string, mixed> $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error(string $message, $data = [], int $status = 400): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
