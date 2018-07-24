<?php

namespace App\Http\Controllers;

use AvoRed\Framework\Models\Database\Configuration;
use AvoRed\Framework\Models\Database\UserCart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use AvoRed\Framework\Models\Database\Product;
use Illuminate\Support\Collection;
use AvoRed\Framework\Cart\Facade as Cart;
use AvoRed\Framework\Cart\Product as CartFacadeProduct;

class CartController extends Controller
{


    /**
     * AvoRed Product Repository
     *
     * @var \AvoRed\Framework\Repository\Product
     */
    protected $productRepository;

    /**
     * AvoRed Config Repository
     *
     * @var \AvoRed\Ecommerce\Repository\Config
     */
    protected $configRepository;

    /**
     * Cart Controller constructor to Set AvoRed Product Repository Property.
     *
     * @param \AvoRed\Framework\Repository\Product $repository
     * @return void
     */
    public function __construct(Product $repository, Configuration $configRepository)
    {
        parent::__construct();
        $this->productRepository    = $repository;
        $this->configRepository     = $configRepository;
    }


    /**
     *
     * Add To Cart Product
     *添加到购物车的产品
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart(Request $request)
    {
        //dd($request);
        //判断用户属否登录 如果登录的化把数据存入user_carts表中
        if (Auth::check())
        {

            $product   = Product::getProductBySlug($request->get('slug'));
            $product_id = $product->id;
            $user_qty  = $request->get('qty',1);

            $user_id    = Auth::user()->id;
            $user_cart = UserCart::whereRaw( 'user_id = ? and product_id =?',[$user_id,$product_id])->first();

            if (is_null($user_cart)){
                $user_cart = new UserCart();
                $user_cart->user_id = $user_id;
                $user_cart->product_id = $product->id;
                $user_cart->product_qty = $user_qty;
            }else{
                $user_cart->product_qty = $user_qty + $user_cart->product_qty;
            }

            $user_cart->save();

        }else{
            //如果用户没有登录  就存在session 中
        $slug = $request->get('slug');
        $qty = $request->get('qty', 1);

        Cart::add($slug, $qty);

        $productModel   = $this->productRepository->getProductBySlug($slug);
        $isTaxEnabled = $this->configRepository->model()->getConfiguration('tax_enabled');

        if($isTaxEnabled && $productModel->is_taxable) {

            $percentage = $this->configRepository->model()->getConfiguration('tax_percentage');
            $taxAmount = ($percentage * $productModel->price / 100);

            Cart::hasTax(true);
            Cart::updateProductTax($slug, $taxAmount);
        }
        }
        return redirect()->back()->with('notificationText', '产品成功地添加到购物车!');




    }

    public function view()
    {
        if (Auth::check()){
            $cartProducts = collect();
            $products = Auth::user()->userCart;
            foreach ($products as $productc){

                $product = Product::find($productc->product_id);
//                dd($product);
                $cartProduct = new CartFacadeProduct();

                $cartProduct->name($product->name)
                    ->qty($productc->product_qty)
                    ->slug($product->slug)
                    ->price($product->price)
                    ->image($product->images);
                $cartProduct->lineTotal($productc->product_qty * $product->price);


                $cartProducts->push($cartProduct);
            }

        }else {
            $cartProducts = Cart::all();
        }

        return view('cart.view')
            ->with('cartProducts', $cartProducts);
    }

    public function update(Request $request)
    {

        Cart::update($request->get('slug'), $request->get('qty',1));

        return redirect()->back();
    }

    public function destroy($slug)
    {
        if (Auth::check()){
            $this->getUserCartBySlug($slug)->delete();
        }else{
            Cart::destroy($slug);
        }


        return redirect()->back();
    }

    public function change($slug){
        if (Auth::check()){
            $cartProducts = $this->getUserCartBySlug($slug);
            $cartProducts->product_qty += 1;
            $cartProducts->save();
        }else{
            Cart::update($slug,1);
        }
        return redirect()->back();
    }

    public function minus($slug){
        if (Auth::check()){
            $cartProducts =$this->getUserCartBySlug($slug);
            $cartProducts->product_qty -= 1;
            $cartProducts->save();
        }else{
            Cart::update($slug,-1);
        }
        return redirect()->back();
    }

    public function getUserCartBySlug($slug){
        return UserCart::whereRaw('product_id = ? and user_id = ?', [Product::where('slug','=',$slug)->first()->id,Auth::id()])->first();
    }
}
