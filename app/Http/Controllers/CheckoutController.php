<?php
namespace App\Http\Controllers;

use AvoRed\Framework\Models\Database\UserCart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use AvoRed\Ecommerce\Models\Database\User;
use AvoRed\Framework\Payment\Facade as Payment;
use AvoRed\Framework\Shipping\Facade as Shipping;
use AvoRed\Framework\Cart\Facade as Cart;
use Illuminate\Support\Facades\URL;
use Liang\ShangPi\Facade as Shangpi;

class CheckoutController extends Controller
{
    /**
     * AvoRed Product Repository
     *
     * @var \AvoRed\Ecommerce\Repository\User
     */
    protected $userRepository;


    /**
     * Admin User Controller constructor to Set AvoRed Ecommerce User Repository.
     *
     * @param \AvoRed\Ecommerce\Repository\User $repository
     * @return void
     */
    public function __construct(User $repository)
    {
        $this->userRepository = $repository;
    }




    public function index()
    {
         $aa = UserCart::with('product')->where('user_id','=',Auth::id())->get();

        $cartItems          = Shangpi::all($aa);

//        $shippingOptions    = Shipping::all();
        $defaultAddress     = Auth::user()->getBillingAddress();
        $shippingOptions    = Auth::user()->getShippingAddress();
//        $shippingOptions    = $this->userRepository->allUserAddresses(Auth::id());
//        dd($defaultAddress);
        $paymentOptions     = Payment::all();

        $countries          = $this->userRepository->countryOptions();

        return view('checkout.index')
            ->with('cartItems', $cartItems)
            ->with('countries', $countries)
            ->with('shippingOptions', $shippingOptions)
            ->with('paymentOptions', $paymentOptions)
            ->with('defaultAddress',$defaultAddress);
    }

}
