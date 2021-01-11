<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->text(25),
            'slug'=>$this->faker->text(35),
            'summary'=>$this->faker->text(50),
            'description'=>$this->faker->text(100),
            'price'=>$this->faker->randomFloat(10,10000,9000000),
            'discount'=>$this->faker->randomFloat(6,1000,9000),//یک مبلغ تخیفیف اولیه
            'image' => $this->faker->image('public/storage/images/category',400,300,null, false) ,
            'status'=>$this->faker->randomElement(['active', 'inactive']),

        ];
    }
}
