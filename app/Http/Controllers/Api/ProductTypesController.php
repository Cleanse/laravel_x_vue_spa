<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\FileUpload;
use App\ProductType;
use App\Http\Resources\ProductTypeResource;

class ProductTypesController extends Controller
{
    public function display()
    {
        $records = ProductType::where(['active' => 1])->get();

        return ProductTypeResource::collection($records);
    }

    public function index()
    {
        return ProductTypeResource::collection(ProductType::paginate(10));
    }

    public function show(ProductType $productType)
    {
        return new ProductTypeResource($productType);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'notes' => 'nullable|string'
        ]);

        return new ProductTypeResource(ProductType::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'notes' => $data['notes']
        ]));
    }

    public function update(ProductType $productType, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'active' => 'required',
            'notes' => 'nullable|string'
        ]);

        $productType->update($request->all());

        return new ProductTypeResource($productType);
    }

    public function destroy(ProductType $productType)
    {
        $productType->delete();

        return response(null, 204);
    }

    public function featured(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fileable_id' => 'required'
        ]);

        $type = ProductType::find($request->input('fileable_id'));

        if (!$type) {
            return response([
                'message' => 'Product Type was not found.'
            ], 404);
        }

        if ($file = $request->file('file')) {
            $fileName = Storage::disk('public')->put('featured', $request->file('file'));
            $size = Storage::size($fileName);

            $fileInformation = [
                'filename' => '/storage/' . $fileName,
                'mime' => $request->file('file')->getClientOriginalExtension(),
                'size' => $size
            ];

            $newUpload = new FileUpload($fileInformation);
            $type->images()->save($newUpload);

            return response([
                'message' => 'Product Type image uploaded.',
                'storage' => $fileInformation
            ], 200);
        }

        return response([
            'message' => 'Error when uploading image.'
        ], 404);
    }
}
