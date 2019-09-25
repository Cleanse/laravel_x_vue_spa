<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\ProductResource;
use App\Product;

class ProductsController extends Controller
{
    public function display()
    {
        $products = Product::where(['active' => 1])->get();

        return ProductResource::collection($products);
    }

    public function index()
    {
        return ProductResource::collection(Product::paginate(10));
    }

    public function show(Product $product)
    {
        if ($product->active === 1) {
            return new ProductResource($product);
        }

        return response([
            'message' => 'Product was not found.'
        ], 404);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_type_id' => 'required',
            'name' => 'required',
            'side_one_max' => 'required',
            'side_two_max' => 'nullable'
        ]);

        return new ProductResource(Product::create([
            'product_type_id' => $data['product_type_id'],
            'name' => $data['name'],
            'side_one_max' => $data['side_one_max'],
            'side_two_max' => $data['side_two_max']
        ]));
    }

    public function update(Product $product, Request $request)
    {
        $request->validate([
            'product_type_id' => 'required',
            'name' => 'required',
            'side_one_max' => 'required',
            'side_two_max' => 'nullable',
            'description' => 'required',
            'notes' => 'nullable|string',
            'active' => 'required'
        ]);

        $product->update($request->all());

        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response(null, 204);
    }

    public function featured(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fileable_id' => 'required'
        ]);

        $product = Product::find($request->input('fileable_id'));

        if (!$product) {
            return response([
                'message' => 'Product was not found.'
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

            if (is_null($product->featured())) {
                $newUpload = new FileUpload($fileInformation);
                $product->featured()->save($newUpload);
            } else {
                $currentFeatured = FileUpload::where([
                    'fileable_id' => $request->input('fileable_id'),
                    'fileable_type' => 'App\Product'
                ])
                    ->orderBy('id', 'desc')
                    ->first();

                $currentFeatured->update($fileInformation);
            }

            return response([
                'message' => 'Product image uploaded.',
                'storage' => $fileInformation
            ], 200);
        }

        return response([
            'message' => 'Error when uploading image.'
        ], 404);
    }
}
