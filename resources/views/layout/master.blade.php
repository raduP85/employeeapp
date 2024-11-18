<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta desctiption="{{ config('app.name') }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }}</title>

  @vite('resources/css/app.css')
</head>
<body class="antialiased bg-slate-100">
  @include('layout.mainNav')

  <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-8">
    @yield('content')
  </div>

  @include('layout.footer')
  
  @vite('resources/js/bladejs.js')
  @stack('scripts')
</body>
</html>