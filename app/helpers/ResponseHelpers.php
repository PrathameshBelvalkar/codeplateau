<?php

use App\Http\Resources\GeneralResponse;
if (!function_exists('generateResponse')) {
    function generateResponse(array $response, $data = array())
    {
        if (!empty($data)) {
            $response['data'] = $data;
        }
        return new GeneralResponse($response);
    }
}
