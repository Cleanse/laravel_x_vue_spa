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
        return ProductTypeResource::collection(ProductType::all());
    }

    public function show(ProductType $productType)
    {
        return new ProductTypeResource($productType);
    }
}
