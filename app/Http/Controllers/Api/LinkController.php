<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Link;
use App\Services\GlobalSettings\GlobalSettings;
use App\Services\ShortenLink\GetUserApiToken;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index(Request $request)
    {
        $links = Link::active();

        if($request->get('search')){
            $links->where('original_link', 'Like', '%' . $request->get('search') . '%');
        }

        if ($request->get('order')) {
            if($request->get('orderdirection') == 'desc'){
                $links->orderBy($request->get('order'),  'DESC');
               
            }else{
                $links->orderBy($request->get('order'));
            }
           
        }

        $links = $links->withCount('linkClicks')->ordered();

        $links = $links->paginate(GlobalSettings::ITEMS_PER_PAGE);

        return $links;
    }

    public function update(Link $id, Request $request)
    {
        $link = $id;

        $request->validate([
            'description' => ['max:255']
        ]);

        // get user by the sent token
        $user = GetUserApiToken::get($request->api_token);

        $link->description = $request->description;
        $link->save();

        return true;
    }

}
