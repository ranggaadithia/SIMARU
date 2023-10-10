<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>SIMARU</title>
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <livewire:styles />
</head>
<body>
 @yield('container')

 <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

 <script>
  localStorage.theme = 'light'
 </script>

@stack('scripts')

<livewire:scripts />
</body>
</html>