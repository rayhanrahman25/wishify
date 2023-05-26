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
        
        // --- load app script to the shopify store
        $shop->api()->rest('POST', '/admin/api/2023-04/script_tags.json', [
            'script_tag' => [
                'event' => 'onload',
                'src' => 'https://wishify.test/js/wishify.js',
            ],
        ]);

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
