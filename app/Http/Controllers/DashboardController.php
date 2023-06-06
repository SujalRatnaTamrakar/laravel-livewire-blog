<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard', [
            'posts' => Post::where('user_id',Auth::id())->latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }
}
