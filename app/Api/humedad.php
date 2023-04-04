<?php

namespace App\Api;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class humedad 
{
    public $city;
    public static function mostrarHumedad($city)
    {
        $url = env('URL_SERVER_API');
        $q = 'q='.$city;
        $key = '&appid=726e52009a6de7013e4b8f470cc4f4c5';
        $response = Http::get($url.$q.$key);
        return $response;
    }

    
}