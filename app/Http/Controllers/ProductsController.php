<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{

    function get_products()
    {
        $shop = Auth::user();
        $get_products = Wishlist::pluck('product_id')->all();
        $wishlisted_product_ids = array_unique($get_products);
        $product_lists = [];

        foreach($wishlisted_product_ids as $wishlisted_product) {
        array_push($product_lists, "gid://shopify/Product/{$wishlisted_product}");
        }

        $product_lists = json_encode($product_lists);
        $query = "
            {
                nodes(ids: $product_lists ) {
                ... on Product {
                    id
                    title
                    handle
                    featuredImage {
                      originalSrc
                    }
                    totalInventory
                    vendor
                    onlineStorePreviewUrl
                    priceRange{
                    maxVariantPrice{
                        currencyCode
                        amount
                        }
                    }
                    }
                }
            }
        ";

        $get_wishlisted_products = $shop->api()->graph($query);
        return $get_wishlisted_products;
    }

    function index()
    {
        $get_wishlisted_products = $this->get_products();
        return view('products', compact('get_wishlisted_products'));
    }
}
