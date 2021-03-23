<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Status;
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
                'menu（メニュー）で口コミが集められる！登録方法や配達可能エリアも紹介',
                'SNSマーケティングのポイントとは｜UGCを促しユーザーと接点をもつコツ・事例',
                'EFO（Entry Form Optimization：エントリフォームの最適化）とは？意味やメリット、離脱削減に向けて気をつけたいポイント紹介',
                'リベンジ消費とは／中国ではすでに消費拡大！インバウンド対策もアフターコロナに向けて始動',
                'AISASモデルとは | 消費者の購買活動を喚起するネット広告の認知プロセス'
            ]),
            'status_id' => Status::pluck('id')->random()
        ];
    }
}
