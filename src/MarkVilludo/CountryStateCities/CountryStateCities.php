<?php

namespace MarkVilludo\CountryStateCities;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;

use App\Http\Resources\ProvinceResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\CityResource;
use Illuminate\Http\Request;

class CountryStateCities {

    public function __construct(Country $country, Province $province, City $city)
    {
        $this->country = $country;
        $this->province = $province;
        $this->city = $city;
    }

    /**
       * Help easily get all countries
       *
       * @param string $email
       * @param string $password
       * @return response
    */

    public function countries()
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

    /**
     * Get Provinces / states list by country id
     *
     * @return \Illuminate\Http\Response
     */
    public function provinces($countryId)
    {
        $provinces = $this->province->where('country_id', $countryId)->get();

        if ($provinces) {
            $data['message'] = config('app_messages.ShowProvinceList');
            return $data = ProvinceResource::collection($provinces);
        } else {
            $data['message'] = config('app_messages.NoProvinceFound');
            $statusCode = 200;
        }
        return $data;
    }
   
    /**
     * Get cities list by province / state id
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provinceId)
    {
        $cities = $this->city->where('province_id', $provinceId)->orderBy('name', 'asc')->get();

        if ($cities) {
            $data['message'] = config('app_messages.ShowCityList');
            return $data = CityResource::collection($cities);
        } else {
            $data['message'] = config('app_messages.NoCityFound');
            $statusCode = 200;
        }
        return $data;
    }

}


