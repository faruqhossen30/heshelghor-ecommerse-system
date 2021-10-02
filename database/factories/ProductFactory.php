<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product\Product;
use Illuminate\Support\Str;

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
            'title'             => $this->faker->name,
            'description'       => $this->faker->text,
            'short_description' => $this->faker->text,
            'slug'              => Str::of($this->faker->name)->slug('-'),
            'category_id'       => rand(38, 40),
            'subcategory_id'    => rand(1, 7),
            'brand_id'          => rand(2),
            'colors'            => '["1","2","3"]',
            'sizes'             => '["1","2","3"]',
            'author'            => 'merchant',
            'author_id'         => 1,
            'shop_id'           => 2,
            'regular_price'     => rand(50,100),
            'sale_price'        => rand(50,100),
            // 'offer_price'       => $request->offer_price,
            'price'             => rand(50,100),
            'quantity'          => rand(5,10),
            'quantity_alert'    => rand(5,10),
            // 'puk_code'       => $request->title,
            'image'             => '["1712395778090986.jpg","1712395778244286.png","1712395778339626.png","1712395778564221.png"]',
        ];
    }
}
