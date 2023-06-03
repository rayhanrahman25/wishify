@extends('shopify-app::layouts.default')
@vite('resources/css/app.css')
@include('layouts.navigation')
@section('content')
  <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Products</h1>
    </div>
  </header>

  <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
      <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
        <div class="mt-8">
          <div class="flow-root">
            <ul role="list" class="-my-6 divide-y divide-gray-200">
              <li class="flex py-6">
                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                  <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                </div>
                <div class="ml-4 flex flex-1 flex-col">
                  <div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                      <h3>
                        <a href="#">Throwback Hip Bag</a>
                      </h3>
                      <p class="ml-4">$90.00</p>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Salmon</p>
                  </div>
                  <div class="flex flex-1 items-end justify-between text-sm">
                    <p class="text-gray-500">Qty 1</p>

                    <div class="flex">
                      <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                    </div>
                  </div>
                </div>
              </li>
              <li class="flex py-6">
                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                  <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg" alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch." class="h-full w-full object-cover object-center">
                </div>

                <div class="ml-4 flex flex-1 flex-col">
                  <div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                      <h3>
                        <a href="#">Medium Stuff Satchel</a>
                      </h3>
                      <p class="ml-4">$32.00</p>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Blue</p>
                  </div>
                  <div class="flex flex-1 items-end justify-between text-sm">
                    <p class="text-gray-500">Qty 1</p>

                    <div class="flex">
                      <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection