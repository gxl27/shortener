<?php

namespace App\Services\ShortenLink;

use App\Models\Link;
use App\Services\ExternalUrl\CheckExternalUrl;
use App\Services\GlobalSettings\GlobalSettings;

class ShortenLinkGenerator
{
    const CHARS = 7;

    public static function generate(string $url): string
    {
        Self::checkUrlValid($url);

        $path = GlobalSettings::path();
        $shorten = $path . Self::randomString();

        return $shorten;

    }

    private static function checkUrlValid($url)
    {

        $isValidkUrl = CheckExternalUrl::check($url);

        if(!$isValidkUrl){
            throw new \Exception("This link does not exists!", 404);
        }
    }

    private static function randomString(): string
    {
        $randomString = '';
        // remove some ambigue chars like : o, 0, 1, i, l, I
        $characters = '23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        
        for ($i = 0; $i < Self::CHARS; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $isValidString = Self::checkValidString($randomString);
        if(!$isValidString){
            // if the slug is already taken, use recursive function
            Self::randomString();
        }
        
        return $randomString;

    }

    private static function checkValidString($randomString): bool
    {
        $link = Link::where('original_link', $randomString)->first();
        if($link){
            
            return false;
        }

        return true;
    }

}