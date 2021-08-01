<?php

namespace App\Http\Controllers\API;

class ResponseFormatter {
    protected static $response = [
        'meta' => [
            'code'=> 200,
            'status' => 'Success',
            'message' => null
        ],
        'data' => null
    ];

    // Fungsi Success
    public static function success($data = null, $message = null){

        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }

    // Fungsi Failed
    public static function error($data = null, $message = null, $code = 400){

        self::$response['meta']['status'] = 'error';
        self::$response['meta']['code'] = $data;
        self::$response['meta']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['meta']['code']);
    }
}