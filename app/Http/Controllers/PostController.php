<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // App\Models内のPostクラスをインポート

class PostController extends Controller
{
    public function index(Post $post) // インポートしたPostをインスタンス化して$postとして使う
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]); 
        // blade内変数'posts'と設定。'posts'の中身にインスタンス化した$postをgetByLimitで代入
    }
}
?>