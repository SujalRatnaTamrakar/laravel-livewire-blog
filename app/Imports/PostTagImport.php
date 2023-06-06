<?php

namespace App\Imports;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PostTagImport implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $post_tags = [];

        foreach ($collection as $row){
            $post_slug = Str::slug($row['title']);
            $post_count = Post::where('title',$row['title'])->where('content',$row['content'])->get();
            $tags = explode(',', $row['tags']);
            if($post_count>1){
                $post_slug = $post_slug . '-' . ($post_count-1);
            }
            $post_id = Post::where('slug',$post_slug)->first()->id;
            $tag_ids = Tag::whereIn('name',$tags)->pluck('id');
            foreach ($tag_ids as $tag_id){
                array_push($post_tags,[
                    'post_id'  =>  $post_id,
                    'tag_id'  => $tag_id
                ]);
            }
        }
        DB::table('post_tag')->upsert($post_tags,['post_id','tag_id']);
    }
}
