@include('layouts.head')
<body>
  <div id="app">
    @include('layouts.sidebar_sp')
    <div class="l-content">
      <div class="l-content__inner">
        <aside class="l-sidebar">
          @include('layouts.sidebar')
        </aside>
        <main class="l-main u-flex">
          @yield('content')
        </main>
      </div>
    </div>
  </div>
</body>

</html>