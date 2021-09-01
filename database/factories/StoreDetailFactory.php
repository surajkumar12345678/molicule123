<?php

namespace Database\Factories;

use App\Models\Layout;
use App\Models\Plan;
use App\Models\StoreDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StoreDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'store_name'=>$this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'store_logo'=>$this->faker->imageUrl($width = 640, $height = 480),
            'about_store'=>$this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'domain_name'=>$this->faker->domainName(),
            'color'=>$this->faker->hexcolor(),
            'user_id'=>User::factory(),
            'plan_id'=>Plan::factory(),
            'layout_id'=>Layout::factory(),

        ];
    }
}
