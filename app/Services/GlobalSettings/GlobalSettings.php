<?php

namespace App\Services\GlobalSettings;

class GlobalSettings 
{
    // paginator items per page
    const ITEMS_PER_PAGE = 10;

    // set the expired link to 4 years
    const EXPIRED_LINK_DAYS = 1461;

    const SERVER = "https://shortener.lucianturlea.ro/";
    const ENDPOINT = "link/";

    public static function path(): string
    {
        return SELF::SERVER . SELF::ENDPOINT;
    }

}