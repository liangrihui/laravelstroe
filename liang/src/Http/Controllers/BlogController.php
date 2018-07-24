<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6
 * Time: 9:56
 */

namespace Liang\Http\Controllers;

use Liang\Models\Article;
use Liang\Models\Comment;

class BlogController extends Controller
{
    public function index(){
        $articles = Article::with('user')->orderBy('created_at','desc')->paginate(9);

//        dd($articles);
        return view('Liang::articles.index')->with('articles', $articles);
    }

}