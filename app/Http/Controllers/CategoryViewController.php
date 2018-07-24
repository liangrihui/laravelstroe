<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AvoRed\Framework\Models\Database\Product;

class CategoryViewController extends Controller
{
    /**
     * AvoRed Attribute Repository
     *
     * @var \AvoRed\Framework\Repository\Product
     */
    protected $productRepository;

    public function __construct(Product $repository)
    {
        parent::__construct();
        $this->productRepository   = $repository;
    }

    /**
     *
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\Response
     *
     */
    public function view(Request $request, $slug)
    {
        //$p  = Product::find(1);

        $productsOnCategoryPage = 3;

        $category       = $this->productRepository->findCategoryBySlug($slug);

        $catProducts    = $this->productRepository->getCategoryProductWithFilter($category->id, $request->except(['page']));
//    dd($request->except(['page']));
        $products       = $this->productRepository->productPaginate($catProducts, $productsOnCategoryPage);

//        $products       = Product::paginate(6);
        return view('category.view')
            ->with('category', $category)
            ->with('params', $request->all())
            ->with('products', $products);

    }
}
