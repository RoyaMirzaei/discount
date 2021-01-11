<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;


    public function definition()
    {
        return [
            'title' => $this->faker->text(25),
            'slug'=>$this->faker->text(50),
            'summary'=>$this->faker->text(100),
            'image' => $this->faker->image('public/storage/images/category',400,300,null, false) ,
            'status'=>$this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
