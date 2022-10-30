<?php

namespace App\Services\ShortenLink;

use App\Models\User;

class GetUserApiToken
{

    public static function get(string $token): User
    {
        $user = User::where('api_token', $token)->first();
        
        if (!$user){
            throw new \Exception("Token is not valid!", 404);
        }

        return $user;
    }


}