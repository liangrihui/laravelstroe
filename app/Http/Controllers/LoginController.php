<?php

namespace App\Http\Controllers;

use AvoRed\Framework\Models\Database\Product;
use AvoRed\Framework\Models\Database\UserCart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use AvoRed\Ecommerce\Models\Database\User;

class LoginController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

    /**
     * AvoRed Product Repository
     *
     * @var \AvoRed\Ecommerce\Repository\User
     */
    protected $userRepository;

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
//    protected $redirectTo = '/my-account';


    /**
     * Admin User Controller constructor to Set AvoRed Ecommerce User Repository.
     *
     * @param \AvoRed\Ecommerce\Repository\User $repository
     * @return void
     */

    public function __construct(User $repository)
    {
        parent::__construct();

        $this->middleware('front.guest', ['except' => 'logout']);

        $url = URL::previous();
        $checkoutUrl = route('checkout.index');

        if ($url == $checkoutUrl) {
            $this->redirectTo = $checkoutUrl;
        }

        $this->userRepository = $repository;
    }

    protected function guard()
    {
        return Auth::guard('web');
    }


    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $user = $this->userRepository->model()->whereEmail($request->get('email'))->first();

        if (!empty($user->activation_token)) {
            return redirect()->route('login')
                ->withErrors(['email' => '请激活你的电子邮件', 'enableResendLink' => 'true']);

        }

        if ($this->attemptLogin($request)) {
            $this->addToUserCart();
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {

        return view('auth.login');
    }


    public function addToUserCart(){
        $products = session()->get('cart_products');
        if (!is_null($products)){
            foreach ($products as $product){

                $user_id = Auth::id();
                $qty = $product->qty();
                $slug = $product->slug();
                $product_id = $this->getProductIdBySluy($slug);
                $user_cart = UserCart::whereRaw( 'user_id = ? and product_id =?',[$user_id,$product_id])->first();

                if (is_null($user_cart)){
                    $user_cart = new UserCart();
                    $user_cart->user_id = $user_id;
                    $user_cart->product_id = $product_id;
                    $user_cart->product_qty = $qty;
                }else{
                    $user_cart->product_qty = $qty + $user_cart->product_qty;
                }

                $user_cart->save();
//                dd($product_id);exit;


            }
        }
    }

    public function getProductIdBySluy($slug){
        return Product::where('slug','=',$slug)->first()->id;
    }
    /**
     * Return url for after user  Login or Register
     *
     * @return string
     */
    public function redirectPath() {

        return session()->pull('previous') ;
//        dd();
//        return url()->previous();

    }
}
