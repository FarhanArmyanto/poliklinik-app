<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    @include('components.partials.sidebar')
    <div class="content-wrapper">
      @include('components.partials.header')
      {{ $slot }}
    </div>
    @include('components.partials.footer')
  </div>
</body>
