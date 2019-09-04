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

    public function uploadFile(Request $request) {
        $file = Input::file('file');
        $filename = $file->getClientOriginalName();

        $path = hash( 'sha256', time());

        if(Storage::disk('uploads')->put($path.'/'.$filename,  File::get($file))) {
            $input['filename'] = $filename;
            $input['mime'] = $file->getClientMimeType();
            $input['path'] = $path;
            $input['size'] = $file->getClientSize();
            $file = FileEntry::create($input);

            return response()->json([
                'success' => true,
                'id' => $file->id
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }
}
