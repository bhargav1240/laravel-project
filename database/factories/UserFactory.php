<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'is_admin' => false
        ];
    }

    public function isAdmin(){
        return $this->state([
            'is_admin' => true
        ]);
    }

    //php artisan tinker
    //use App\Models\User; ===> it will import User model
    //User::factory()->make(); ===> it will make one new user
    //User::factory(3)->make(); ===> it will make 3 new user
    //User::factory()->isAdmin()->make(); ===> it will make one new user with is_admin = true
}
