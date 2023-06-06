<?php

namespace App\Http\Controllers;

use App\Exports\PostExport;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Imports\CategoriesImport;
use App\Imports\PostsImport;
use App\Imports\PostTagImport;
use App\Imports\TagsImport;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function show(Post $post)
    {
        return view('blog', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(CreatePostRequest $request)
    {
        try {
            /*Get validated fields and add other fields*/
            $attributes = $request->validated();
            $attributes['user_id'] = auth()->id();
            $attributes['thumbnail'] = request()->file('thumbnail') == null ? "null" : request()->file('thumbnail')->store('thumbnails','public');
            Storage::setVisibility($attributes['thumbnail'], 'public');
            $attributes['slug'] = STR::slug(request()->get('title'), '-');
            /*Create Post*/
            DB::beginTransaction();
            $post = Post::create($attributes);

            /*Fetch all tags*/
            $tags = json_decode($attributes['tags'],true);

            // Prepare the data for upsert
            $tagData = [];
            foreach ($tags as $tag) {
                $tagData[] = [
                    'name' => $tag['value'],
                    'slug' => Str::slug($tag['value']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            // Upsert the tags into the database
            DB::table('tags')->upsert($tagData, 'name');

            // Retrieve the tag IDs for the associated post
            $tagIds = Tag::whereIn('name', $tags)->pluck('id','name');

            // Attach the tags to the post
            $post->tags()->attach($tagIds);
            DB::commit();
            session()->flash('success','Post has been created successfully!');
            return redirect(route('dashboard'));
        } catch (\Exception $exception){
            DB::rollBack();
            session()->flash('error','Error creating a post!');
            return redirect(route('dashboard'));
        }
    }

    public function edit(Post $post){
        return view('edit',compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post){
        try {
            /*Get validated fields and add other fields*/
            $attributes = $request->validated();
            $attributes['thumbnail'] = request()->file('thumbnail') == null ? $post->thumbnail : request()->file('thumbnail')->store('thumbnails','public');
            $attributes['slug'] = STR::slug(request()->get('title'), '-');
            /*Create Post*/
            DB::beginTransaction();
            $post->update($attributes);

            /*Fetch all tags*/
            $tags = json_decode($attributes['tags'],true);

            // Prepare the data for upsert
            $tagData = [];
            foreach ($tags as $tag) {
                $tagData[] = [
                    'name' => $tag['value'],
                    'slug' => Str::slug($tag['value']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            // Upsert the tags into the database
            DB::table('tags')->upsert($tagData, 'name');

            // Retrieve the tag IDs for the associated post
            $tagIds = Tag::whereIn('name', $tags)->pluck('id','name');

            // Attach the tags to the post
            $post->tags()->sync($tagIds);
            DB::commit();
            session()->flash('success','Post has been updated successfully!');
            return redirect(route('dashboard'));
        } catch (\Exception $exception){
            DB::rollBack();
            session()->flash('error','There was an error updating the post!!');
            return redirect(route('dashboard'));
        }
    }

    public function destroy(Post $post){
        try {
            DB::beginTransaction();
            $post->delete();
            DB::commit();
            return redirect(route('dashboard'));
        }catch (\Exception $exception){
            DB::rollBack();

        }
    }

    public function export(){
        return Excel::download(new PostExport, 'posts.xlsx');
    }

    public function import(){
        try {
            DB::beginTransaction();
            Excel::import(new TagsImport(),request()->file('file'));
            Excel::import(new CategoriesImport(),request()->file('file'));
            Excel::import(new PostsImport,request()->file('file'));
            Excel::import(new PostTagImport(),request()->file('file'));
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => 'Successfully imported!'
            ],200);
        } catch (\Exception $exception){
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => $exception->getMessage()
            ],500);
        }
    }

}
