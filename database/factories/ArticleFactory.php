<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use App\Models\Categories;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {

        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'slug' => $this->faker->sentence,
        ];

    }

    public function configure()
    {
        return $this->afterCreating(function (Article $article) {
            $categoryIds = Categories::all()->random(2)->pluck('id')->toArray();
            $article->categories()->attach($categoryIds);
        });
    }
}