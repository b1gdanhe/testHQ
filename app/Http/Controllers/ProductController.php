<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category = null, $price = null)
    {
        $products = ProductResource::collection(Product::with('category', 'price')->get());

        return $products->all();
    }
}
