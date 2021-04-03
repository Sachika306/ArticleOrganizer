<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Status;
use App\Models\Thumbnail;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;
    protected $status = Status::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => NULL,
            'status_id' => Status::pluck('id')->random()
            ];
        }
}
