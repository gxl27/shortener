<?php

namespace App\Services\ExternalUrl;

use Illuminate\Support\Facades\Http;

class ExternalUrlHost
{

    public static function getHost(string $url): string
    {
        $isValidkUrl = CheckExternalUrl::check($url);

        if(!$isValidkUrl){

            $response =  "This link expired or does not exists!";

        }
        else{
            $request = Http::get($url);
            $response = $request->transferStats->getRequest()->getUri()->getHost();
        }
        
        return $response;

    }

}