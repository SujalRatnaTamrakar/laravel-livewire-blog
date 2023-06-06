<?php

namespace App\Imports;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class TagsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $tagData = [];

        foreach ($rows as $row) {
            $tags = explode(',', $row['tags']);

            foreach ($tags as $tagName) {
                $tagData[] = [
                    'name' => $tagName,
                    'slug' => Str::slug($tagName),
                ];
            }
        }

        // Upsert the tags into the database
        DB::table('tags')->upsert($tagData, ['name'], ['slug']);
    }
}
