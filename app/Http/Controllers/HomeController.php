<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function __invoke()
    {
        //Obtenemos a quienes seguimos
        $ids = auth()->user()->followings->pluck('id','username')->toArray();
        $posts = Post::whereIn("user_id",$ids)->latest()->paginate(20);        
        return view("home",[
            "posts"=>$posts
        ]);
    }
}
