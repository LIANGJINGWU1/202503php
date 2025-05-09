<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    public function creating(Post $post):void{
        //自动生成slug
        if(!$post->exists){
            $slug = Str::slug($post->title);

            $original = $slug;
            $i = 1;
            while(Post::where('slug',$slug)->exists()){
                $slug = $original.'-'.$i;
            }

            $post->slug = $slug;
        }
    }

    public function created(Post $post):void{
        //同时给新发布的文章在对应的meta表中插入数据
        if(!$post->metadata){
            $post->metadata()->create(['post_id' => $post->id]);
        }
    }

    public function updating(Post $post):void{
        $oldSlug = $post->getOriginal('slug');
        $newSlug = Str::slug($post->title);
        if($oldSlug !== $newSlug){
            $post->slug = $newSlug;
        }
    }

    public function updated(Post $post): void
    {
        //
    }

    public function deleted(Post $post): void
    {
        //
    }
    public function restored(Post $post): void
    {
        //
    }
    public function forceDeleted(Post $post): void
    {
        //
    }
}
