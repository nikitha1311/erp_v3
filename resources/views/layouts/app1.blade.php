<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
        <link rel='stylesheet' href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link href="{{ asset('css/main.css')  }}"  rel="stylesheet">
        <link href="{{ asset('css/style.css')  }}" rel="stylesheet">
    </head>
    <body>
        <div class="sb-nav-fixed">
            @include('layouts.topbar')
            <div id="layoutSidenav">
                @include('layouts.sidebar')

                <main id='layoutSidenav_content'class="">
                    @yield('content')
                </main>
        {{--        @include('layouts.content')--}}
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
