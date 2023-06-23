@extends('shopify-app::layouts.default')
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite('resources/css/app.css')
@include('layouts.navigation')
@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
  <div id="wrapper" class="container px-4 py-4 mx-auto">
      @if(!$settings)
      @include('partials.active-modal')
      @endif
      <div class="sm:grid sm:h-32 sm:grid-flow-row sm:gap-4 sm:grid-cols-3">
         <x-status type="positive" title="Today's wishists" number=" {{ $get_wishlist->today ?? 0 }} "  growth="9" />
         <x-status type="negative" title="Yesterday's wislists" number=" {{ $get_wishlist->yesterday ?? 0 }} " growth="20"  />
         <x-status type="normal" title="Total wislists" number=" {{ $get_wishlist->total ?? 0 }} " growth="0" />
      </div>
 </div>
 </div>
@endsection
@section('scripts')
    @parent
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      });

      function configureTheme()
        {
          $.ajax({
            url: '{{ route("theme.configuration") }}',
            type: 'POST',
            success: function(response) {
              document.getElementById('configure-btn').remove();
              document.getElementById('modal-title').innerHTML = "Theme Successfully Configured";
              document.getElementById('modal-description').innerHTML = "Wishify Configured your theme successfully";
            },
            error: function(xhr) {
                // Handle the error response
                alert(xhr.responseText);
            }
        });
        }
        
    </script>
@endsection