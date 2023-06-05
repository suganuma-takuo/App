<?php

namespace App\Http\Controllers;

use App\Models\Post; // App\Models内のPostクラスをインポート
use App\Http\Requests\PostRequest; 

class PostController extends Controller
{
    public function index(Post $post) // インポートしたPostをインスタンス化して$postとして使う
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]); 
        // blade内変数'posts'と設定。'posts'の中身にインスタンス化した$postをgetByLimitで代入
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Post $post, PostRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
?>