<?php

namespace Database\Factories;

use App\Models\Layout;
use Illuminate\Database\Eloquent\Factories\Factory;

class LayoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Layout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'layout_name'=>$this->faker->word(),
        ];
    }
}
