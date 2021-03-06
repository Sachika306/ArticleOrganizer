<?php

namespace Database\Factories;

use App\Models\ArticleAssignment;
use App\Models\Article;
use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleAssignmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticleAssignment::class;
    protected $outlineAssignment = OutlineAssignment::class;
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
            // 'article_id'はArticleTableSeederで生成
            'article_user_id' => RoleUser::where('role_id', '=', '4')->pluck('user_id')->random()
        ];
    }
}
