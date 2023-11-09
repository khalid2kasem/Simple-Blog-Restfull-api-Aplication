<?php

namespace App\Http\Helpers;

use Illuminate\Http\Response as HttpResponse;

class ApiResponse 
{
    public static function make(bool $success = false, $message = '', $data = [], $statusCode, $errors = null)
    {
        return response()->json(
            [
                'success' => $success,
                'message' => $message,
                'data' => $data,
                'errors' => $errors,
            ],
            $statusCode
        );
    }
}