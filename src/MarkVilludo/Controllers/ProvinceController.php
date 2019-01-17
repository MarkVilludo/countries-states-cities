<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProvinceResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use Response;

class ProvinceController extends Controller
{
    //
    //construct model
    public function __construct(Province $province)
    {
        $this->province = $province;
    }
   
    /**
     * Get Provinces
     *
     * @return \Illuminate\Http\Response
     */
    public function index($countryId)
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
}
