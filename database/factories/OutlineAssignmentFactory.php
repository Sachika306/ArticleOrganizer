<?php

namespace Database\Factories;

use App\Models\OutlineAssignment;
use App\Models\Article;
use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class OutlineAssignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OutlineAssignment::class;
    protected $article = Article::class;
    protected $roleuser = RoleUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'outline_user_id' => RoleUser::where('role_id', '=', '7')->pluck('user_id')->random(),
            'outline_deadline' => $this->faker->dateTimeBetween('+10 days', '+30 days')->format('Y-m-d')
        ];
    }
}
