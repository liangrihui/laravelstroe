<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/31
 * Time: 15:40
 */

namespace Liang\ShangPi;

use Liang\ShangPi\Shangpi as Shang;

class Product implements Shang
{
    protected $name;

    protected $id;

    protected $qty;

    protected $slug;

    protected $price;

    protected $image;

    protected $lineTotal;


    public function name( $name = null)
    {
        if ($name == null){
            return $this->name;
        }
        $this->name = $name;
        return $this;
    }

    public function price($price = null)
    {
        if ($price == null){
            return $this->price;
        }
        $this->price = $price;
        return $this;
    }

    public function qty( $qty = null)
    {
        if ($qty == null){
            return $this->qty;
        }
        $this->qty = $qty;
        return $this;
    }

    public function id($id = null)
    {
        if ($id == null){
            return $this->id;
        }
        $this->id = $id;
        return $this;
    }

    /**
     * @param mixed $slug
     */
    public function slug($slug = null)
    {
        if ($slug == null){
            return $this->slug;
        }
        $this->slug = $slug;
        return $this;
    }

    /**
     * @param mixed $image
     */
    public function image($image = null)
    {
        if (null === $image) {
            return $this->image;
        }

        $this->image = $image;

        return $this;
    }

    /**
     * @param mixed $lineTotal
     */
    public function lineTotal($amount = null)
    {
        if ($amount == null){
            return $this->price * $this->qty;
        }
        $this->lineTotal = $amount;
        return $this;
    }

    public function priceFormat(){
        return number_format($this->price(),2);
    }

    public function finalPrice()
    {
        return number_format($this->price() * $this->qty(), 2);
    }

    public function hasAttributes()
    {
        return false;
    }
}