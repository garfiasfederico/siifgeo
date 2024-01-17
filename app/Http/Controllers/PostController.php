<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
        
    }
    public function index(User $user){
        
        $post = Post::where("user_id",$user->id)->paginate(4);        
        return view('dashboard',[
            "user"=>$user,
            "posts"=>$post
        ]);
    }

    public function create(Request $request){
        return view('posts.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            "titulo" => ['required'],
            "descripcion" => ['required'],
            "imagen" => ['required']
        ]);


        Post::create([
            "titulo" => $request->titulo,
            "descripcion" => $request->descripcion,
            "imagen" => $request->imagen,
            "user_id" => auth()->user()->id
        ]);

        return redirect()->route('posts.muro',auth()->user()->username);
    }

    public function show(User $user, Post $post){
        return view('posts.show',
    [
        'post' => $post,
        "user"=>$user,
    ]);
    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);
        $post->delete();

        //Eliminamos la Imagen
        $imagenPath = public_path('uploads/').$post->imagen;
        if(File::exists($imagenPath)){
            unlink($imagenPath);
        }
        return redirect()->route('posts.muro',auth()->user()->username);
    }
}