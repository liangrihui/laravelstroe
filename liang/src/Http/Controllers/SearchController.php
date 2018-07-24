<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6
 * Time: 18:59
 */

namespace Liang\Http\Controllers;


use \Illuminate\Http\Request;
use Liang\Models\Article;

class SearchController extends Controller
{
    public $search;
    public function article(Request $request){
//        dd($search);

    if ($request->has('search')){
        $this->search = $request->input('search');
    }
        $articles = Article::where(function ($query)  {
             $query->where('title','like','%'.$this->search.'%')
             ->orwhere('tags','like', '%'.$this->search.'%');
        })->paginate(9);
        return view('Liang::articles.index')->with('articles', $articles);
    }

}