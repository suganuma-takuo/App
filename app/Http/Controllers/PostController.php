<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // App\Models内のPostクラスをインポート

class PostController extends Controller
{
    public function index(Post $post) // インポートしたPostをインスタンス化して$postとして使う
    {
        return $post->get(); // $postの中身が戻り値
    }
}
