<?php

namespace AvoRed\Ecommerce\Models\Database;

use AvoRed\Framework\Image\LocalFile;
use AvoRed\Framework\Models\Database\UserCart;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Liang\Models\Article;
use Liang\Models\Comment;
use Liang\Models\Image;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'company_name', 'image_path', 'status', 'language', 'activation_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return $this->attributes['first_name'].' '.$this->attributes['last_name'];
    }

    public function getImagePathAttribute()
    {
        return (empty($this->attributes['image_path'])) ? '' : new LocalFile($this->attributes['image_path']);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function createUserAddress($requests){

        Address::create($requests);
    }

    public function allUserAddresses($user_id){
        $address = Address::where('user_id','=',$user_id )->get();
        return $address;
    }
    public function findAddress($id){

        return Address::find($id);
    }
    public function destroyUserAddress($id){
        Address::find($id)->delete();
    }

    public function userViewedProducts()
    {
        return $this->hasMany(UserViewedProduct::class);
    }

    public function getShippingAddress()
    {
        $address = $this->addresses()->where('type', '=', 'SHIPPING')->get();

        return $address;
    }

    public function getBillingAddress()
    {
        $address = $this->addresses()->where('type', '=', 'BILLING')->first();

        return $address;
    }

    public function isInWishlist($productId)
    {
        $wishList = Wishlist::where('user_id', '=', $this->attributes['id'])
            ->where('product_id', '=', $productId)->get();

        if (count($wishList) <= 0) {
            return false;
        }

        return true;
    }

    public function wishlistModel(){
        return new Wishlist();
    }
    public static function model(){
        return new static;
    }

    public function userCart(){
        return $this->hasMany(UserCart::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function countryOptions(){
        return Country::pluck('name','id');
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }
}
