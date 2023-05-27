<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $validate = $request->validate([
            'shop_id' => 'string',
            'customer_id' => 'string',
            'product_id' => 'string',
        ]);

        // store wishlist
        Wishlist::create([
            'shop_id' => $validate['shop_id'],
            'customer_id' => $validate['customer_id'],
            'product_id' => $validate['product_id'],
        ]);

        echo json_encode(["message" =>  "Product added to wishlist successfully"]); 
        
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
