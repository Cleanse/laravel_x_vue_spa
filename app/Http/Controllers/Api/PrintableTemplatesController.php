<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\FileUpload;
use App\PrintableTemplate;
use App\Http\Resources\PrintableTemplateResource;

class PrintableTemplatesController extends Controller
{
    public function display()
    {
        $records = PrintableTemplate::where(['active' => 1])->get();

        return PrintableTemplateResource::collection($records);
    }

    public function index()
    {
        return PrintableTemplateResource::collection(PrintableTemplate::paginate(10));
    }

    public function show(PrintableTemplate $printableTemplate)
    {
        return new PrintableTemplateResource($printableTemplate);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        return new PrintableTemplateResource(PrintableTemplate::create([
            'name' => $data['name'],
            'description' => $data['description']
        ]));
    }

    public function update(PrintableTemplate $printableTemplate, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'active' => 'required'
        ]);

        $printableTemplate->update($request->all());

        return new PrintableTemplateResource($printableTemplate);
    }

    public function destroy(PrintableTemplate $printableTemplate)
    {
        $printableTemplate->delete();

        return response(null, 204);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:pdf,svg|max:2048',
            'fileable_id' => 'required'
        ]);

        $printableTemplate = PrintableTemplate::find($request->input('fileable_id'));

        if (!$printableTemplate) {
            return response([
                'message' => 'Printable Template was not found.'
            ], 404);
        }

        if ($file = $request->file('file')) {
            $fileName = Storage::disk('public')->put('templates', $request->file('file'));
            $size = Storage::size($fileName);

            $fileInformation = [
                'filename' => '/storage/' . $fileName,
                'mime' => $request->file('file')->getClientOriginalExtension(),
                'size' => $size
            ];

            $newUpload = new FileUpload($fileInformation);
            $printableTemplate->image()->save($newUpload);

            return response([
                'message' => 'Printable Template file uploaded.',
                'storage' => $fileInformation
            ], 200);
        }

        return response([
            'message' => 'Error when uploading file.'
        ], 404);
    }
}
