<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

abstract class AbstractApi extends Controller
{
    public function setResponse($data = [], string $message = '')
    {
        return response()->json([
            'data' => $data,
            'message' => $message
        ]);
    }

    public function setResponseOfPage($data = [], string $message = '')
    {
        $data['message'] = $message;
        return response()->json($data);
    }
}
