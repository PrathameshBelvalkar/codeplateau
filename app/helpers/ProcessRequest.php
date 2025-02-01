<?php

use Maatwebsite\Excel\Facades\Excel;

if (!function_exists('getcsvdata')) {
    function getcsvdata($filePath)
    {
        $data = Excel::toArray([], $filePath);
        if (!empty($data) && isset($data[0])) {
            $header = array_shift($data[0]);
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
