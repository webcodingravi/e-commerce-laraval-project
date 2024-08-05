<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->unique()->name();
        $slug = Str::slug($title); 
        $subCategories = [4,5];
        $subCatRandKey = array_rand($subCategories);

        $brands = [1,2,3,4];
        $brandRandKey = array_rand($brands);

        return [
            'title' => $title,
            'slug' => $slug,
            'price' => rand(10, 1000),
            'category_id' => 3,
            'brand_id' => $brands[$brandRandKey],
            'is_featured' => 'Yes',
            'sku' => rand(1000, 10000),
            'track_qty' => 'Yes',
            'qty' => 10,
            'status' => 1,
            'sub_category_id' => $subCategories[$subCatRandKey]
        ];
    }
}
