<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 17:09
 */

namespace Liang\Http\Controllers;


use Illuminate\Http\Request;

use Liang\Models\Article;
use Liang\Models\Bookmark;
use Liang\Models\Html;
use Liang\Models\MyMenu;

class ManageController extends Controller
{
    public function index(){
        return view('Liang::adminlte.admin');
    }

    public function main(){
        return view('Liang::adminlte.main');
    }

    public function login(){
        return view('Liang::articles.ajaxs.login');
    }
    public function createArticle(){

//        $articles = Article::orderBy('id','desc')->paginate(5);
        return view('Liang::articles.ajaxs.create');
    }
    public function updateArticle(Request $request,$id){
//        dd($request->input('id'));
        $article = Article::find($id);
        return view('Liang::articles.ajaxs.detail')->with('article',$article);
    }

    /*
     *  //https://blog.csdn.net/YBaog/article/details/52643701?locationNum=1
     * 根据页码截取不同的文显示
     */

    public function sou(Request $request){

//        //接值
//        $name=Input::get('name');
//        $start=Input::get('start');
//        $end=Input::get('end');
//        //拼接搜索条件
//        $where='1';
//        //模糊查询
//        if(!empty($name)){
//            $where.=" and e_title  like '%$name%'";
//        }
//        //时间段
//        if(!empty($start)){
//            if(!empty($end)){
//                $where.=" and e_time  between  '$start' and '$end'";
//            }
//        }

        //接收当前页码
        $page=$request->input('pages');
        //echo $page;die;
        //判断当前页码是否存在
        $pages = isset($page) ? $page : 1 ;
        //echo $pages;die;
        //计算总条数
        $count = Article::count();
        //设置每一页显示的条数
        $pageSize = 8 ;
        //计算总页数
        $pageSum = ceil($count/$pageSize);
        // echo $pageSum;
        //计算偏移量
        $offset = ($pages - 1)*$pageSize;
        //echo $offset;die;
        //计算上一页 下一页
        $last = $pages<=1 ? 1 : $pages-1 ;
        $next = $pages>=$pageSum ? $pageSum : $pages+1 ;
        $pain ='<ul class="pagination" role="navigation">';
//        $pain ="<a href='javascript:void(0);' onclick='page(1)'>首页</a>
//        <a href='javascript:void(0);' onclick='page($last)'>上一页</a>
//        <a href='javascript:void(0);' onclick='page($next)'>下一页</a>
//        <a href='javascript:void(0);' onclick='page($pageSum)'>尾页</a>";
        if ($pageSum>1){
                if ($pages == 1){
                        $pain .= '<li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                </li>';
                        $pain .= $this->strpage($pages,$pageSum);
                        $pain .= '<li class="page-item">
                                <a class="page-link" href="javascript:void(0)" rel="next" aria-label="Next &raquo;" onclick="page('.$next.')">&rsaquo;</a>
            </li>';
                }elseif ($pages == $pageSum){

                        $pain .= '<li class="page-item" aria-disabled="true" aria-label="&laquo; Previous">
                                <span class="page-link" aria-hidden="true" onclick="page('.$last.')">&lsaquo;</span>
                                </li>';
                        $pain .= $this->strpage($pages,$pageSum);
                        $pain .= '<li class="page-item disabled">
                <a class="page-link" href="javascript:void(0)" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
            </li>';

                } else{

                        $pain .= '<li class="page-item" aria-disabled="true" aria-label="&laquo; Previous">
                                <span class="page-link" aria-hidden="true" onclick="page('.$last.')">&lsaquo;</span>
                                </li>';
                        $pain .= $this->strpage($pages,$pageSum);
                        $pain .= '<li class="page-item">
                <a class="page-link" href="javascript:void(0)" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
            </li>';
                    }

        }else{
            $pain = '<ul class="pagination" role="navigation">
                    <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                    <li class="page-item active" aria-current="page" onclick="page(1)">
                    <span class="page-link">1</span>
                    </li>
                    <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Next">
               <span class="page-link" aria-hidden="true" onclick="page('.$next.')">&rsaquo;</span>
                     </li>';
        }
        $pain .= '</ul>';


        //查询分页后的数据信息
//        $results = DB::select("select * from email limit $offset,$pageSize");
        $results = Article::orderBy('id','desc')->offset($offset)->limit($pageSize)->get();
        //关键字变红
//        foreach($results as $key=>$val){
//            $results[$key]->e_title=str_replace($name,"<font color='red'>$name</font>",$val->e_title);
//        }

        //渲染
        return view('Liang::articles.ajaxs.article',['articles'=>$results,'page'=>$pain]);
    }

    /*
     * 根据传入的类型，获取不同的书签到书签界面
     */

    public function bookmark($type){

            $bookmarks  = Bookmark::where('menu_id',$type)->orderBy('url')->get();
            $bool       = true;
            $title      = MyMenu::select('name')->where('id',$type)->first();

            return view('Liang::bookmarks.bookmark')->with('bookmarks',$bookmarks)->with('title',$title['name'])->with('type',$type)->with('bool',$bool);

    }

    /*
     * 添加书签
     * 获取书签的 url
     *
     * 书签图标从http://favicon.byi.pw/?url=获得
     * v2  改为 http://statics.dnspod.cn/proxy_favicon/_/favicon?domain= ‘url’
     */
    public function addBookmark(Request $request){

        $url  = $request->input('url');
        $bool = Bookmark::where('url',$url)->count();
        $type =$request->input('type');

        if ($bool !=0){

            return redirect()->route('manage.bookmark',['type'=>$type])->with('massages','书签已经存在！');

        }else{

            $title = Html::getTitle($url);
            $img = 'http://statics.dnspod.cn/proxy_favicon/_/favicon?domain='.$url;
            $bookmark = new Bookmark();
            $bookmark->name     = $title;
            $bookmark->menu_id  = $type;
            $bookmark->img      = $img;
            $bookmark->url      = $url;
//        dd($bookmark);
            $bookmark->save();

            return redirect()->route('manage.bookmark',['type'=>$type])->with('massages','书签添加成功！');
        }

    }

    /*
     * 删除书签
     *
     */
    public function deleteBookmark($id){

        $bookmark = Bookmark::find($id);
        $type     = $bookmark->menu_id;
        $bookmark->delete();

        return redirect()->route('manage.bookmark',['type'=>$type])->with('massages','书签删除成功！！！');

    }

    /*
     * 查询书签
     * 通过ajax post 过来的请求
     * 获取查询第一个书签作为默认的类型
     */
    public function searchBookmark(Request $request){
//            dd($request->all());
        $name           = $request->input('search');
        $type           = $request->input('type');

        $bookmarks      = Bookmark::where('name','like','%'.$name.'%')->get();

        if ($bookmarks->isEmpty()){
            return view('Liang::bookmarks.bookmark')->with('bookmarks',$bookmarks)->with('title',' 查询结果为 空 ')->with('type',$type)->with('bool',true);
        }
        return view('Liang::bookmarks.bookmark')->with('bookmarks',$bookmarks)->with('title','查询')->with('type',$type)->with('bool',true);

    }

    /*
     * 添加菜单
     * $request
     */
    public function addMenu(Request $request){
//        dd($request->all());
        $name = $request->input('name');
        $parent_id = $request->input('parent_id');
        if ($parent_id==0){

            $parent_id=null;
        }else{

            $parent = MyMenu::where('id',$parent_id)->first();
            $parent->route = '';
            $parent->save();
        }
        $route ='manage.main';

        $menu = new MyMenu();
        $menu->name = $name;
        $menu->parent_id = $parent_id;
        $menu->route = $route;
        $menu->save();

        return redirect()->route('manage.main')->with('massages','添加成功！请尽快和开发者联系添加菜单路由');
    }


    /*
     * 删除菜单
     */
    public function deleteMenu($id){

//        dd($id);
        $menu = MyMenu::find($id);
        $menu->delete();

        return view('Liang::adminlte.main')->with('massages','删除成功');

    }

    /*
     * 更新菜单
     */
    public function updateMenu(Request $request){
//        dd($request);
        $id = $request->input('id');
        $name = $request->input('values');

        $menu = MyMenu::find($id);
        $menu->route = $name;
        $menu->save();

        return view('Liang::adminlte.main')->with('massages','修改成功');
    }

























//获取分页的HTML代码
    public function strpage($pages,$pageSum){
        $str = '';
        for ($s=1;$s<$pageSum+1;$s++){
            if ($pages == $s){
                $str.= '<li class="page-item active" aria-current="page" onclick="page('.$s.')">
                    <span class="page-link">'.$s.'</span>
                    </li>';
            }else{
                $str.= '<li class="page-item" aria-current="page" onclick="page('.$s.')">
                    <span class="page-link">'.$s.'</span>
                    </li>';
            }

        }
        return $str;
    }

}