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
            'description' => 'required'
        ]);

        return new ProductTypeResource(ProductType::create([
            'name' => $data['name'],
            'description' => $data['description']
        ]));
    }

    public function update(ProductType $productType, Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'active'      => 'required',
            'notes'       => 'nullable|string'
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
        //Setup Validation & Look into the symlink

        $type = ProductType::find($request->input('product_type'));

        if (!$type) {
            return response([
                'message' => 'Product Type was not found.'
            ], 404);
        }

        $path = Storage::put('featured/' . $request->input('product_type'), $request->file('file'), 'public');
        $size = Storage::size($path);

        $fileInformation = [
            'filename' => rtrim($path, '/'),
            'mime' => $request->file('file')->getClientOriginalExtension(),
            'path' => $path,
            'size' => $size
        ];

        $newUpload = new FileUpload($fileInformation);
        $type->images()->save($newUpload);

        return response([
            'message' => 'uploaded'
        ], 200);
    }
}
