<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use App\Services\GlobalSettings\GlobalSettings;
use App\Http\Controllers\Controller;
use App\Services\ExternalUrl\CheckExternalUrl;
use App\Services\ExternalUrl\ExternalUrlHost;
use App\Services\ExpiredLink\GenerateExpiredLink;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  
    public function index() 
    {
        return view('admin/index', [
            'api_token' => auth()->user()->api_token
        ]
    );
        
    }
    
}
