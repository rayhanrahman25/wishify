<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    function index()
    {
        $shop = Auth::user();
        $settings = Settings::where("shop_name", $shop->name)->first();
        $get_wishlist = Wishlist::selectRaw('COUNT(*) as total,
        COUNT(CASE WHEN DATE(created_at) = CURDATE() THEN 1 END) as today,
        COUNT(CASE WHEN DATE(created_at) = CURDATE() - INTERVAL 1 DAY THEN 1 END) as yesterday')
        ->first();
        return view('dashboard', compact(['settings','get_wishlist']));
    }
}
