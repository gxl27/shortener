<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\LinkClick;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  
    public function index(Request $request) {

        $links = Link::all();
        $linksCount = $links->count();

        $clicks = LinkClick::all();
        $clicksCount = $clicks->count();

        return view('index', [
            'linksCount' => $linksCount,
            'clicksCount' => $clicksCount
        ]
    );
        
    }
    
}
