<?php
namespace App\Repositories\Interfaces;

interface ArticleInterface
{
    public function findArticle(Array $cat_id,$is_draft,$order,$take);

}