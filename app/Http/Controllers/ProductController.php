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
        $per_page = request('per_page', 5);
        $products = Product::with('category', 'price')->paginate($per_page);

        return $products;
    }
}
