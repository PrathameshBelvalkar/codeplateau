<?php

namespace App\Http\Controllers;

use App\Http\Requests\File\FileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller
{
    public function upload(FileRequest $request)
    {
        try {

            $path = $request->file('file')->store('public/uploads');
            $filePath = Storage::path($path);
            $data = getcsvdata($filePath);
            $requiredFields = ['Certificate Name', 'Cource Code', 'Name'];
            $header = $data['header'];
            foreach ($requiredFields as $field) {
                if (!in_array($field, $header)) {
                    return generateResponse([
                        'type' => "error",
                        'status' => false,
                        'code' => 500,
                        'message' => "Error: Required field '$field' is missing in CSV.",
                    ], );
                }
            }
            return generateResponse([
                'type' => "success",
                'status' => true,
                'code' => 200,
                'message' => 'File uploaded successfully',
            ], [
                'header' => $data['header'],
                'data' => $data['data']
            ]);
        } catch (\Exception $e) {
            return generateResponse([
                'type' => "error",
                'status' => false,
                'code' => 500,
                'message' => 'something went wrong',
            ]);
        }
    }

}
