@include('layouts.head')
<body>
  <div id="app">
    @include('layouts.header')
    <div class="l-content">
      <div class="l-content__inner">
        <aside class="l-sidebar">
          @include('layouts.sidebar')
        </aside>
        <main>
          @yield('content')
        </main>
        <div class="l-search">
          @include('layouts.search')
        </div>
      </div>
    </div>
  </div>
</body>

</html>