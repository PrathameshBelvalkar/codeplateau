<?php

use Maatwebsite\Excel\Facades\Excel;

if (!function_exists('getcsvdata')) {
    function getcsvdata($filePath)
    {
        $data = Excel::toArray([], $filePath);
        if (!empty($data) && isset($data[0])) {
            $header = $data[0][0];
            $header = array_unique($header);
            $rows = $data[0];
        } else {
            $header = [];
            $rows = [];
        }
        return [
            'header' => $header,
            'data' => $rows
        ];
    }
}
