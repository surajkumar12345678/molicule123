<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\StoreDetail;
use App\Models\User;
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
            'title'=>$this->faker->sentence($nbWords=2, $variableNbWords=true),
            'description'=>$this->faker->sentence($nbWords=20, $variableNbWords=true),
            'feature_image'=>$this->faker->imageUrl($width = 640, $height = 480, $category = null),
            'product_type'=>ProductType::all()->random()->id,
            'sku'=>$this->faker->unique()->randomDigit,
            'price'=>$this->faker->randomNumber(2),
            'gtin'=>$this->faker->randomNumber(5),
            'stock'=>$this->faker->randomNumber(2),
            'price_in_currency_set'=>$this->faker->currencyCode,
            'product_mode'=>$this->faker->word,
           'digital_file'=>$this->faker->word,
           'shipping'=>$this->faker->word,
           'best_seller'=>$this->faker->word,
           'weight'=>$this->faker->word,
           'feature_home'=>$this->faker->word,
           'feature_category'=>$this->faker->word,
           'user_id'=>User::where('role', 'merchent')->get()->random()->id,
            'store_detail_id'=>StoreDetail::all()->random()->id,
            'category_id'=>Category::all()->random()->id,
        ];
    }
}
/**
 *'category');
  *          $table->string('title');
   *         $table->string('description');
    *        $table->string('feature_image');
     *       $table->string('product_type');
      **      $table->string('sku');
         *   $table->string('price')->nullable();
        *    $table->string('gtin')->nullable();
          *  $table->string('stock')->nullable();
           * $table->string('price_in_currency_set')->nullable();
            *$table->string('product_mode')->nullable();
*            $table->string('digital_file')->nullable();
 *           $table->string('shipping')->nullable();
  *          $table->string('best_seller')->nullable();
   *         $table->string('weight')->nullable();
    *        $table->string('feature_home')->nullable();
     ***       $table->string('feature_category')->nullable();
        **    $table->foreignId('user_id')->constrained('users', 'id');
   *         $table->foreignId('store_detail_id')->constrained('store_details', 'id');
 */
