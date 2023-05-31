<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
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
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id'=>Category::factory(),
            'tag_id'=>Tag::factory(),
            'title' =>$this->faker->sentence,
            'excerpt'=>$this->faker->paragraph(2),
            'content'=>$this->faker->paragraphs(6,true),
            'thumbnail'=> "null",
            'slug'=>$this->faker->slug,
            'published_at'=>$this->faker->dateTimeThisYear
        ];
    }
}
