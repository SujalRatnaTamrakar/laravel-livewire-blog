<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PostsGrid extends Component
{
    use WithPagination;

    public $search = '';
    public $category = [];
    public $author = [];
    public $tag = [];
    private $authors,$categories,$tags,$posts;

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->authors = User::all()->pluck('name','id');
        $this->categories = Category::all()->pluck('name','id');
        $this->tags = Tag::all()->pluck('name','id');
    }

    public function render()
    {
        $posts = Post::latest()
            ->where(function ($query) {
                if (!empty($this->search)) {
                    $query->orWhere('title', 'like', '%' . $this->search . '%')
                        ->orWhere('content', 'like', '%' . $this->search . '%')
                        ->orWhere('excerpt', 'like', '%' . $this->search . '%');
                }
                if (!empty($this->category)){
                    $query->whereIn('category_id',$this->category);
                }
                if (!empty($this->author)){
                    $query->whereIn('user_id',$this->author);
                }
                if (!empty($this->tag)){
                    $query->whereHas('tags',function ($query){
                        $query->whereIn('id',$this->tag);
                    });
                }
            })
            ->paginate(9)
            ->withQueryString();
        return view('livewire.posts-grid', [
            'posts' => $posts,
            'authors' => $this->authors,
            'categories' => $this->categories,
            'tags' => $this->tags
        ]);
    }

    public function gotoPage($page)
    {
        $this->setPage($page);
        $this->emit('gotoTop');
    }

    public function nextPage($pageName = 'page')
    {
        $this->setPage($this->page + 1);
        $this->emit('gotoTop');
    }

    public function previousPage($pageName = 'page')
    {
        $this->setPage(max($this->page - 1, 1));
        $this->emit('gotoTop');
    }

    public function clearFilters(){
        $this->author = [];
        $this->category = [];
        $this->tag = [];
        $this->render();
    }


}
