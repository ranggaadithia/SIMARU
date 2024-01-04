<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ isset($title) ? $title . ' | ' : '' }}  {{ config('app.name') }}</title>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <livewire:styles />
  @vite('resources/css/app.css')
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />

</head>
<body x-data="{ open: false }" class="font-poppins">
  @yield('container')
  
 <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js" data-navigate-track></script>

 <script>
  localStorage.theme = 'light'
 </script>

<livewire:scripts />
@stack('scripts')
</body>
</html>