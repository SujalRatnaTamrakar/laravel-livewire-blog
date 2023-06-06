<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class CategoriesImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
     * @param array $row
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
        return new Category([
            'name' => $row['category'],
            'slug' => Str::slug($row['category'])
        ]);
    }

    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return ['name','slug'];
    }
}
