<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ShortenerController extends Controller
{
  
    public function index() {

        return view('admin/shortener/index', [
            'api_token' => auth()->user()->api_token
        ]
    );
        
    }
    
}
