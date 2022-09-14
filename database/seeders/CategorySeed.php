<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'insurance',
            'vehicle',
        ];
        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category]);
        }
    }
}
