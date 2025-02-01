<?php

use Maatwebsite\Excel\Facades\Excel;

if (!function_exists('getcsvdata')) {
    function getcsvdata($filePath)
    {
        $data = Excel::toArray([], $filePath);
        if (!empty($data) && isset($data[0])) {
            $header = $data[0][0];
            $header = array_unique($header);
            array_unshift($header, 'sr no');
            $rows = array_slice($data[0], 1);
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
