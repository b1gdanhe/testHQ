<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PriceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prices = [
            [
                'product' => 'Full coverage insurance',
                'final' => '89000',
            ],
            [
                'product' => 'Compact Car X3',
                'final' => '99000',
            ],
            [
                'product' => 'SUV Vehicle, high end',
                'final' => '150000',
            ],
            [
                'product' => 'Basic coverage',
                'final' => '20000',
            ],
            [
                'product' => 'Convertible X2, Electric',
                'final' => '250000',
            ],
        ];
        foreach ($prices as $price) {
            $product = Product::where('name', $price['product'])->first();
            if ($product->category->name == 'insurance') {
                $discount_percentage =  30;
                $original =  $price['final'] + (($price['final'] * $discount_percentage) / 100);
            } elseif ($product->sku == '000003') {
                $discount_percentage =  15;
                $original =  $price['final'] + (($price['final'] * $discount_percentage) / 100);
            } else {
                $discount_percentage =  null;
                $original =  $price['final'];
            }
            Price::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'original' => $original,
                ],
                [
                    'discount_percentage' => $discount_percentage,
                    'final' => $price['final'],
                    'currency' => 'EUR',
                ]
            );
        }
    }
}
