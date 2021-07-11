<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'factur' => $this->faker->numberBetween(1,1000),
            'operator'=> $this->faker->name(),
            'location'=> $this->faker->city(),
            'type' => $this->faker->randomElement([
               'revenue','cost','sales','purchase'
              ]),
             'description' => $this->faker->paragraph(),
             'amount'=> $this->faker->numberBetween(0,1000),
             'status' => $this->faker->randomElement(['OK','CANCEL'])
        ];
    }
}
