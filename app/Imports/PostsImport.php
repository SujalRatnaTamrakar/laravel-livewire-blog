<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class PostsImport implements ToModel, WithHeadingRow, WithUpserts
{

    /**
     * @param array $row
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
        $slug = Str::slug($row['title']);

        if (Post::where('slug','LIKE','%'.$slug.'%')->exists()){
            $slug = $slug . '-' . Post::where('slug','LIKE','%'.$slug.'%')->count();
        }
        return new Post([
            'title' => $row['title'],
            'excerpt' => $row['excerpt'],
            'slug' => $slug,
            'content' => $row['content'],
            'category_id' => Category::where('name',$row['category'])->first()->id,
            'thumbnail' => null,
            'user_id' => Auth::id(),
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return ['slug'];
    }
}
