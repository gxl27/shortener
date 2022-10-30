<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Services\ExpiredLink\GenerateExpiredDate;
use App\Services\ShortenLink\GetUserApiToken;
use App\Services\ShortenLink\ShortenLinkGenerator;
use Illuminate\Http\Request;

class ShortenerController extends Controller
{
    public function index(Request $request)
    {
        if($request->shortener){

            $request->validate([
                'shortener' => ['max:500']
            ]);

            $user = GetUserApiToken::get($request->api_token);
            $shortenLink = ShortenLinkGenerator::generate($request->shortener);
            $expiredDate = GenerateExpiredDate::generate(now());

            // create new shorten link
            $link = new Link();
            $link->original_link = $request->shortener;
            $link->shorten_link = $shortenLink;
            $link->expired_at = $expiredDate;
            $link->user_id = $user->id;
            $link->save();
        }

        return $link;
    }
}
