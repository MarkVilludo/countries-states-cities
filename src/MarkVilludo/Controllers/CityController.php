<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CityResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Response;

class CityController extends Controller
{
    //
    //construct model
    public function __construct(City $city)
    {
        $this->city = $city;
    }
    /**
     * Get Provinces
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
