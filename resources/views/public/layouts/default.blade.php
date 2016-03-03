<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}" />
        <meta name="googlemap_key" content="{{ config('services.googlemap.key') }}" />
        <title>Dubai Properties</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
        <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
        @yield('header_styles')
    </head>

    <body class="@yield('bodyClass')">
        
        @yield('after_body')

        <header>
            @include('public.layouts._nav')
        </header>

        @yield('content')

        @include('public.layouts._footer')

        @include('flash')
