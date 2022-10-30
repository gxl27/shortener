<?php

namespace App\Services\ExternalUrl;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class CheckExternalUrl
{

    public static function check(string $url) :bool
    {
        try{
            $response = Http::get($url);
            
        }catch(ConnectionException $e){
            
            return false;
        }

        return true;

    }

    public static function getHost(string $url): string
    {
        $isValidkUrl = Self::check($url);

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