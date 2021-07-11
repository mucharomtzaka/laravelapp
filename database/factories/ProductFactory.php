<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
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
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        return [
          'name' => $title,
          'slug' => $slug,
          'price' => $this->faker->numberBetween(5, 1000),
          'stock'=>$this->faker->numberBetween(0,1000),
          'rate'=>$this->faker->numberBetween(0,5)
          ,'barcode'=>$this->faker->ean13(),
          'description'=>$this->faker->paragraph()
        ];
    }
}
