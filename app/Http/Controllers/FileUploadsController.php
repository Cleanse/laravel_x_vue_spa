<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\FileUpload;

class FileUploadsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('upload');
    }

    public function update(Request $request)
    {
        $path = $request->file('image')->store('/');
        $size = Storage::size($path);

        $fileInformation = [
            'name' => rtrim($path, '/'),
            'mime' => $request->file('image')->getClientOriginalExtension(),
            'path' => $path,
            'size' => $size,
            'attachment_id' => $request->input('attachment_id'),
            'attachment_type' => $request->input('attachment_type')
        ];

        $newUpload = new FileUpload();
        $newUpload::create($fileInformation);
    }
}
