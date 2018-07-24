<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/5
 * Time: 9:20
 */

namespace Liang\Http\Controllers;


use Illuminate\Http\Request;
use Liang\Models\Article;
use Liang\Models\Tag;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::with('user')->orderBy('created_at','desc')->paginate(9);

        return view('Liang::articles.index')->with('articles', $articles);

    }
    public function create(Request $request){
//        dd($request->all());
        return view('Liang::articles.create');
    }

    public function store(Request $request){

//        dd($request->all());
        if ($request->has('type')){
            $article = Article::find($request->input('id'));
            $article->update($request->all());
            return redirect('manage/article')->with('massages','文章更新成功');
        }else{
        Article::create($request->all());
        $tag = new Tag();
        $tag->addTags($request->input('tags'));
        if ($request->has('create')){
            return redirect('manage/article')->with('massages','文章创建成功');
        }else{
            return redirect('blog/article')->with('massages','文章创建成功');
        }

    }
//        return view('Liang::articles.index')->with('massages','文章创建成功');
    }
    public function show($id){
        $article = Article::with('comment')->find($id);
        return view('Liang::articles.detail')->with('article',$article);

    }

    public function update($id){

    }

    public function edit($id){

    }

    public function destroy($id,$tag,$type=null){
       $article = Article::find($id);
        $article->delete();
        $ta = new Tag();
        $ta->removeTags($tag);
        if ($type ==null){
            return redirect()->back()->with('massages','删除成功！');
        }else{
            return redirect('manage/article')->with('massages','删除成功！');
        }

    }

}