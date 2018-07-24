<?php

namespace AvoRed\Ecommerce\Models\Database;

use AvoRed\Framework\Models\Database\Configuration;
use Illuminate\Http\Request;

class Address extends BaseModel
{
    const BILLING = 'BILLING';
    protected $fillable = [
        'user_id',
        'type',
        'first_name',
        'last_name',
        'province',
        'postcode',
        'city',
        'state',
        'country_id',
        'phone',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function stringAddress(){
        return $this->first_name.$this->last_name.'  '.$this->province.' '.$this->city.' '.$this->state.' '.$this->phone;
    }

    public function getCountryIdAttribute()
    {
        if (isset($this->attributes['country_id']) && $this->attributes['country_id'] > 0) {
            return $this->attributes['country_id'];
        }

        $defaultCountry = Configuration::getConfiguration('user_default_country');

        if (isset($defaultCountry)) {
            return $defaultCountry;
        }

        return '';
    }
}
