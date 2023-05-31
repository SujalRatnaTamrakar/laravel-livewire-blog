<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category','author','tag'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tag(){
        return $this->hasMany(Tag::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeFilter($query, array $filters){
        $query->when(isset($filters['search']) ? $filters['search'] : false, function($query, $search) {
            $query->where('title','like','%' . $search . '%')
                ->orWhere('body','like','%' . $search . '%');

        });
    }
}
