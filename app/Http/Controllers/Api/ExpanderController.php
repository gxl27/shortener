<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\ExternalUrl\ExternalUrlHost;
use Illuminate\Http\Request;

class ExpanderController extends Controller
{
    public function index(Request $request)
    {
        if($request->expander){
            
            $url = ExternalUrlHost::getHost($request->expander);
        }

        return $url;
    }
    
}
