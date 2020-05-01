<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">

        <input type="hidden" id="baseUrl" value="{{ config('app.url') }}">


        @if(Auth::check())
             
              <app :nameapp = "{{ json_encode(config('app.name', 'Laravel')) }}"

                    :auth = "{{ json_encode(Auth::user()) }}">
              </app>

        @endif

        <main class="container py-4">
            @yield('contenidoapp')
        </main>

    </div>
    
     <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
