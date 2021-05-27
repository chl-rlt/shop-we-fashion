<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device.width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>We Fashion</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    </head>
    <body>
        <div class="nav">
            @include('partials.menu')
        </div>
          
        <div class="container">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
		<div class="footer">
                @include('partials.footer')
		</div>
        @section('scripts')
        <script src="{{asset('js/app.js')}}"></script>
        @show
    </body>
</html>