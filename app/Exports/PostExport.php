<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PostExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Post::where('user_id',Auth::id())->get();
    }

    public function headings(): array
    {
        return [
            'Title',
            'Category',
            'Excerpt',
            'Content',
            'Tags',
        ];
    }

    public function map($post): array
    {
        return [
            $post->title,
            $post->category->name,
            $post->excerpt,
            $post->content,
            implode(', ',$post->tags()->pluck('name')->toArray())
        ];
    }
}
