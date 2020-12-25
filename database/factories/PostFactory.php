<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence()
        ];
    }

    //use App\Models\{User,Post}; ===> to import both model
    //User::factory()->has(Post::factory()->count(5))->create(); ===> it will create one user and 5 post for that user and save it to database
    //User::factory()->has(Post::factory(5))->create(); ===> it will create one user and 5 post for that user and save it to database
    //User::factory()->hasPosts(5)->create(); ===> it will create one user and 5 post for that user and save it to database

    //Post::factory()->for(User::factory())->count(3)->create(); ===> it create 3 new post for new user and save it to database
    //Post::factory()->forUser()->count(3)->create(); ===> it create 3 new post for new user and save it to database
    
    
    //Post::factory()->for(User::find(1))->count(3)->create(); ===> it create 3 new post for new user with user_id = 1 and save it to database

}
