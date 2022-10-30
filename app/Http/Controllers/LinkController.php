<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\LinkClick;
use App\Services\GlobalSettings\GlobalSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class LinkController extends Controller
{
  
    public function redir(Request $request) {

        $slug = GlobalSettings::path() . $request->slug;

        // this custom search is not working
        // it should concatenate the shorten_link and description columns
        // and filter if the slug is either in one of the column

        // $link = Link::getCustomSearch($slug)->first();

        $link = Link::where('shorten_link', $slug)->first();
       
        if($link){
            $click = new LinkClick();
            $click->link_id = $link->id;
            $click->created_at = now();
            // the location can be taken with a comunity Laravel package
            $click->location = 'Romania';
            $click->save();

            $redirect = $this->checkHttpOrHttps($link->original_link);

            return redirect()->away($redirect);
        }

        return redirect('/');
        
    }

    private function checkHttpOrHttps($url): string
    {
        $http = "http://";
        $https = "https://";

        if(Str::startsWith($url, $http) || Str::startsWith($url, $https)){

            return $url;
        }

        // if the link has no protocol, add default http
        return $http . $url;

    }
    
}
