<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products  = [
            [
                'sku' => '000001',
                'name' => 'Full coverage insurance',
                'category' => 'insurance',
            ],
            [
                "sku" => "000002",
                "name" => "Compact Car X3",
                "category" => "vehicle",
            ],
            [
                "sku" => "000003",
                "name" => "SUV Vehicle, high end",
                "category" => "vehicle",
            ],
            [
                "sku" => "000004",
                "name" => "Basic coverage",
                "category" => "insurance",
            ],
            [
                "sku" => "000005",
                "name" => "Convertible X2, Electric",
                "category" => "vehicle",
            ]
        ];
        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                [
                    'sku' => $product['sku'],
                    'category_id' => Category::where('name', $product['category'])->first()->id,
                ]
            );
        }
    }
}
