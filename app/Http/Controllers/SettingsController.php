<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Configure current activated theme in shopify
     */
    public function configureTheme()
    {

        $shop = Auth::user();
        $themes = $shop->api()->rest('GET', '/admin/themes.json');

        //---- Get active theme id ----
        $active_theme_id = "";
        foreach($themes['body']->container['themes'] as $theme) {
            if( "main" ===$theme['role']){
            $active_theme_id = $theme['id'];
            }
        }

        //---- Code snippet that you want to store in theme 
        $snippet = "Your snippet code updated";

        //---- Data to pass to our rest api request ----
        $crate_a_file = array('asset' => array('key' => 'snippets/wishify-app.liquid', 'value' => $snippet));
        $shop->api()->rest('PUT', '/admin/themes/'.$active_theme_id.'/assets.json', $crate_a_file);

        // save data into database
        Settings::updateOrCreate([
            'shop_name' => $shop->name,
            'activated' => true,
        ]);
        echo json_encode(["message" => 'configured']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
