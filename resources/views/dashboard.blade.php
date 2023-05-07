@extends('shopify-app::layouts.default')
@vite('resources/css/app.css')
@include('layouts.navigation')
@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
  <div id="wrapper" class="container px-4 py-4 mx-auto">
      @include('partials.active-modal')
      <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">
         <x-status type="positive" title="Today's wishists" number="32"  growth="9" />
         <x-status type="negative" title="Yesterday's wislists" number="20" growth="20"  />
         <x-status type="normal" title="Total wislists" number="430" growth="0" />
      </div>
 </div>
 </div>
@endsection
@section('scripts')
    @parent
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
      function setupTheme(){
        setTimeout(() => {
          alert("Theme Configured");
        }, 3000);
      }
    </script>
@endsection