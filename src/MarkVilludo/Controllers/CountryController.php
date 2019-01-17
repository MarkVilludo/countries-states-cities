<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CountryResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Response;

class CountryController extends Controller
{
    //
    //construct model
    public function __construct(Country $country)
    {
        $this->country = $country;
    }
   
    /**
     * Get Countries
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = $this->country->all();
        if ($countries) {
            $data['message'] = config('app_messages.ShowCountryList');
            return $data = CountryResource::collection($countries);
        } else {
            $data['message'] = config('app_messages.NoCountryFound');
            $statusCode = 200;
        }
        return $data;
    }
}
