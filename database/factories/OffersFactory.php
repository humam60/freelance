<?php

namespace Database\Factories;

use App\Models\Offers;
use Illuminate\Database\Eloquent\Factories\Factory;

class OffersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'title'=>$this->faker->text,
            'description'=>$this->faker->sentence,
            'category_id'=>$this->faker->rand(1),
            'skill_id'=>$this->faker->rand(1),
            'user_id'=>$this->faker->rand(1)
     
        ];
    }
}
