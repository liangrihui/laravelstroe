<?php
namespace App\Http\Controllers;

use AvoRed\Framework\Models\Database\Product;

class ProductViewController extends Controller
{

    /**
     * AvoRed Attribute Repository
     *
     * @var \AvoRed\Framework\Repository\Product
     */
    protected $productRepository;

    /**
     * Cart Controller constructor to Set AvoRed Product Repository Property.
     *购物车控制器构造器来设置avproduct仓库属性
     * @param \AvoRed\Framework\Repository\Product $repository
     * @return void
     */
    public function __construct(Product $repository)
    {
        parent::__construct();
        $this->productRepository = $repository;
    }

    public function view($slug)
    {
        $product = $this->productRepository->getProductBySlug($slug);

        $title          = (!empty($product->meta_title)) ?
                                            $product->meta_title :
                                            $product->name;

        $description    = (!empty($product->meta_description)) ?
                                        $product->meta_description :
                                        substr($product->description, 0, 255);

        return view('product.view')
                                ->with('product', $product)
                                ->with('title', $title)
                                ->with('description', $description);
    }

}
