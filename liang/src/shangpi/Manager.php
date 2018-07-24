<?php

namespace Liang\ShangPi;
use Illuminate\Support\Collection;


/**
在composer.json
 * "autoload": {
"classmap": [
"database",
"liang/src"    //添加自己的命名空间
],
 *  在命令行  执行 composer dump-autoload
 */
class Manager
{
    public $prodcts;

    public function __construct()
    {
        $this->prodcts = Collection::make([]);
    }

    public function add($userCart){
//        dd($userCart);
        $product = new Product();
        $product->qty($userCart->product_qty);
        $product->name($userCart->product->name);
        $product->price($userCart->product->price);
        $product->image($userCart->product->images);
        $product->lineTotal();
//        dd($product);
        $this->prodcts->push($product);
    }

    public function all($userCarts){
        foreach ($userCarts as $userCart){

            $this->add($userCart);
        }
        return $this->prodcts;

    }

}