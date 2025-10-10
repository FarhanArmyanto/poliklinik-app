<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Login' }}</title>

  {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
        integrity="sha512-bxwAFbrqXNGsRLVq1F7q0b0yE9orWm0FTbH5BICR8PT5CkHcwU6JsJ4M2ViYNjv5xSYX9Mbg9HeQbG+j3Ibzaw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-oaKFdMTnp8r8QbVLubCTPEQNea2dp1GsWHqibGLnWD6Np9l4W4=" 
        crossorigin="anonymous">

  @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed min-vh-100">
  {{ $slot }}

  {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" 
          integrity="sha512-894YECLF0WwE0n3vCw6B0d6t6b0T6z0kxq2G2DszMxWP+8abtTE1Pi6jizoUcZz1b7YYmK1B4ter74OE+vEAw==" 
          crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>

  @stack('scripts')
</body>
</html>
