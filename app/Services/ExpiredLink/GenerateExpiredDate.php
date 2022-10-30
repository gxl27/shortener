<?php

namespace App\Services\ExpiredLink;

use App\Services\GlobalSettings\GlobalSettings;

class GenerateExpiredDate
{

    public static function generate(\DateTime $createdDate): \DateTime
    {
        $daysString = GlobalSettings::EXPIRED_LINK_DAYS . " days";

        $expiredDate = $createdDate->modify($daysString);

        return $expiredDate;

    }

}