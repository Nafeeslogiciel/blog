<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
            return[
                'user_id' => \App\Models\User::all()->random()->id,
                'title' => $this->faker->sentence(),
                'description' => $this->faker->paragraph(),
                'image_url'=>$this->faker->imageUrl(),
                'published'=>$this->faker->date(),
                'username'=>$this->faker->name(),

            ];
            
            


            //
       
    }
}
