<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    private function verifyHmac($data, $hmacHeader)
    {
        $secret = config('shopify.shared_secret'); // Replace with your Shopify secret
        $calculatedHmac = base64_encode(hash_hmac('sha256', $data, $secret, true));

        return hash_equals($hmacHeader, $calculatedHmac);
    }

    public function check_wishlist(Request $request)
    {
        // $wishify_secret = config('e3581355119c3ee0019ddc39622ce44b');
        // $wishify_hmac_header = $request->header('x-shopify-hmac-sha256');
        // $wishify_requested_data = $request->getContent();
        // $wishify_hmac = base64_encode(hash_hmac('sha256', $wishify_requested_data, $wishify_secret, true));
        // if ($wishify_hmac_header !== $wishify_hmac) {
        //     // Invalid request, HMAC doesn't match
        //     return response()->json(['error' => 'Invalid request.']);
        // }

        echo json_encode(["message" => "success"]); 
        
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
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
