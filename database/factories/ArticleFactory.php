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
            'title' => $this->faker->randomElement([
                '飲食店のデジタルトランスフォーメーション（DX）導入事例3選 & 3つの注意点を解説',
                'Googleマイビジネスの最適化 | 重要性や必要な対策、注意点を解説',
                '検索上位入りで集客力向上へ | 条件や期待される効果、SEO対策の始め方について紹介',
                'AISASモデルとは | 消費者の購買活動を喚起するネット広告の認知プロセス',
                '自営業者が効率的に集客する方法｜注意するポイントや活用したいサービス紹介',
                'フレームワークとは？ビジネスに役立つ13選｜使う状況や分析方法を紹介'
                ]),
            'status_id' => rand(1, 2)
            ];
        }
}
