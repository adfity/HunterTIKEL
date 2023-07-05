<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;
    /**
     * Define the model's default state.
     *
     * @return array< mixed>
     */
    public function definition()
    {
        return [
            //
            'category_id'=>Category::inRandomOrder()->orderBy('id')->first(),
            'title'=>$this->faker->title,
            'content'=>$this->faker->paragraph,
        ];
    }
}
