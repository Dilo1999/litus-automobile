<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Premium Wireless Headphones',
                'description' => 'High-quality wireless headphones with noise cancellation and 30-hour battery life.',
                'price' => 199.99,
                'category' => 'Electronics',
                'stock' => 25,
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500',
            ],
           
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
