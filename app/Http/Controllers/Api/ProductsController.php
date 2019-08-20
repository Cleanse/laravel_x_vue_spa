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
        return ProductResource::collection(Product::where('product_type_id', '=', $id)->get());
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
