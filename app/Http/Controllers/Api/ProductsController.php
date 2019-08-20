<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\ProductResource;
use App\Product;

class ProductsController extends Controller
{
    public function index(Request $id)
    {
        $products = Product::where([
            'product_type_id' => $id,
            'active' => 1
        ])->get();

        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
