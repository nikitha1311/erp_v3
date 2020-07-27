<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel='stylesheet' href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link href="{{ asset('css/style.css')  }}" rel="stylesheet">
        <link href="{{ asset('css/main.css')  }}" rel="stylesheet">
    </head>
    <body>
        <div class="sb-nav-fixed">
            @include('layouts.topbar')
            <div id="layoutSidenav">
                @include('layouts.sidebar')
                <main id='layoutSidenav_content'>
                    <div class="container py-4">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>      
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script>
            @if(session()->has('notification'))
            new Noty({
                type: '{{ session('notification.type') }}',
                text: '{{ session('notification.msg') }}',
                timeout: 5000,
                progressBar: true,
            }).show();
            @endif
        </script>
        @yield('scripts')
    </body>
</html>
