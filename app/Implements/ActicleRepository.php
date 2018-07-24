<?php
namespace App\Repositories\Implement;

use App\Repositories\Interfaces\ArticleInterface;
use Liang\Models\Article;

class ArticleRepository implements ArticleInterface
{
    public function findArticle(Array $cat_id, $is_draft, $order, $take)
    {
        $query = Article::whereIn('category_id',$cat_id)->where('is_draft',$is_draft)->orderBy('created_at', $order)->take($take)->get();
        return $query;
    }

}