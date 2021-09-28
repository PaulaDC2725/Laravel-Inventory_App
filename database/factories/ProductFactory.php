<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'cost' => random_int(100,20000),
            'price' => random_int(1,100),
            'quantity' => random_int(1000, 40000),
            'brand_id' => random_int(1, 10),
            'categories_id' => random_int(1, 10),
        ];
    }
}
