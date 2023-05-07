
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wishify</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
<div class="min-h-full">
    @include('layouts.navigation')
    @yield('title')
     
         <main>
           @yield('content')
         </main>
     </div>
</body>
</html>
@yield('scripts')
