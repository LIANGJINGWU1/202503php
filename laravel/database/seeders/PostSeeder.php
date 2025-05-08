<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Metadata;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //确保作者和标签在
        if(Author::count() == 0){
            $this->call(AuthorSeeder::class);
        }
        if (Tag::count() == 0) {
            $this->call(TagSeeder::class);
        }

        $authors = Author::all();
        $tags = Tag::all();

        if($authors->isEmpty()){
            $this->command->info("authors table not exists");
        }

        Post::factory()->count(50)->make()->each(function($post) use ($authors, $tags){
            //随机分配作者
            $post->author_id = $authors->random()->id;
            $post->save();
            //为帖子创建元数据

            Metadata::factory()->create(['post_id' => $post->id]);

            //为帖子关联标签1-5
            if($tags->isNotEmpty()){
                $post->tags()->attach($tags->random(rand(1,min(5,$tags->count())))
                    ->pluck('id')->toarray());
            }
        });
    }
}
