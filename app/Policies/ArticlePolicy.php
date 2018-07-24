<?php

namespace App\Policies;

use AvoRed\Ecommerce\Models\Database\User;
use Liang\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /*
     * 定义某些用户可以过滤本策略,
     *
     * @param  User $user
     */

    public function before($user, $ability){

        if ($user->isSuperAdmin())
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view the article.
     *
     * @param  \AvoRed\Ecommerce\Models\Database\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function view(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \AvoRed\Ecommerce\Models\Database\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param  \AvoRed\Ecommerce\Models\Database\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param  \AvoRed\Ecommerce\Models\Database\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        //
    }
}
