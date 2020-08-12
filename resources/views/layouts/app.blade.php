<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JSM ERP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel='stylesheet' href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <link href="{{ asset('css/style.css')  }}" rel="stylesheet">
        <link href="{{ asset('css/main.css')  }}" rel="stylesheet">
        @yield('head')
    </head>
    <body>
        <div class="sb-nav-fixed">
            @include('layouts.topbar')
            <div id="layoutSidenav">
                @include('layouts.sidebar')
                <main id='layoutSidenav_content' class='{{ (!empty(auth()->user()->name)) ? '' : 'pl-0'}}'>
                    <div class="container py-4" id='app'>
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

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
