<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\ProductTypeResource;
use App\ProductType;

class ProductTypesController extends Controller
{
    public function index()
    {
        $types = ProductType::where('active', 1)->get();

        return ProductTypeResource::collection($types);
    }

    public function show(ProductType $productType)
    {
        return new ProductTypeResource($productType);
    }
}
