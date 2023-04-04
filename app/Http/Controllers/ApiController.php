<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Api;
use App\Api\humedad;
use App\Models\Historial;

class ApiController extends Controller
{
    public function index()
    {
       $cityOne = "bogota";
       $dataApi = $this->dataHumidity($cityOne);
       return view('humedad',compact('cityOne','dataApi'));
    }

    public function viewMap(Request $request)
    {
        $data = $request->except('_token');
        $cityOne = implode($data);
        $dataApi = $this->dataHumidity($cityOne);
        return view('humedad',compact('cityOne','dataApi'));  
    }

    public function dataHumidity($city)
    {
        $response = humedad::mostrarHumedad($city);
        $api = $response->json();
        $data = $api['main'];
        $humidity = $data['humidity'];
        $dataOne = $api['sys'];
        $country = $dataOne['country'];
        $city = $api['name'];
        $dataApi = array("humidity" => $humidity, "country" => $country, "city"=>$city);
        return $dataApi;
    }

    
}
