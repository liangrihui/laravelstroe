<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/7
 * Time: 17:34
 */

namespace Liang\Http\Controllers;




use Illuminate\Http\Request;
use Liang\Models\Comment;

class CommentController extends Controller
{
    public function saveComment(Request $request){
        Comment::create($request->input());
//        dd($request->input());
        return redirect()->back()->with('massages','评论成功！');
    }




}