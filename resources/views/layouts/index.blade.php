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
</head>
<body>
 @yield('container')
 <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

 <script>
  localStorage.theme = 'light'
  const datepickerDisablePast = document.getElementById('datepicker-disable-past');
  new te.Datepicker(datepickerDisablePast, {
    disablePast: true
  });
 </script>
</body>
</html>