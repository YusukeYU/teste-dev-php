<?php

namespace App\Heart\Http\Controllers;

class ApiBaseController extends Controller
{

    public function responseSuccess($message = '', $data = [], $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function responseError($message, $data = [], $code = 200)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
