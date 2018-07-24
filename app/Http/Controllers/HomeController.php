<?php
namespace App\Http\Controllers;

use AvoRed\Framework\Models\Database\Configuration;
use AvoRed\Ecommerce\Models\Database\Page;
use Laing\Settle;

class HomeController extends Controller
{


    /**
     * AvoRed Product Repository
     *
     * @var \AvoRed\Ecommerce\Models\Database\Page;
     */
    protected $pageRepository;

    /**
     * AvoRed Config Repository
     *
     * @var \AvoRed\Ecommerce\Models\Database\Configuration;
     */
    protected $configRepository;

    /**
     * Admin User Controller constructor to Set AvoRed Ecommerce User Repository.
     *
     * @param \AvoRed\Ecommerce\Models\Database\Page $repository
     * @param \AvoRed\Ecommerce\Models\Database\Configuration $configRepository
     * @return void
     */
    public function __construct(Page $repository, Configuration $configRepository)
    {
        $this->pageRepository   = $repository;
        $this->configRepository = $configRepository;
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pageModel = null;
        $pageId = $this->configRepository->getConfiguration('general_home_page');

//        $menus = Menu::all();

        if(null !== $pageId) {
            $pageModel = $this->pageRepository->findPageById($pageId);
        }

        return view('home.index')->with('pageModel', $pageModel);

    }
    public function index1()
{


    $pageModel = null;
    $pageId = $this->configRepository->getConfiguration('general_home_page');

//        $menus = Menu::all();

    if(null !== $pageId) {
        $pageModel = $this->pageRepository->findPageById($pageId);
    }

    return view('home.index1')->with('pageModel', $pageModel);

}
}
