@include('layouts.head')
<body>
  <div id="app">
    <div class="l-content">
      <div class="l-content__inner">
        <aside class="l-sidebar">
          @include('layouts.sidebar')
        </aside>
        <main class="l-main">
          @yield('content')
        </main>
      </div>
    </div>
  </div>
</body>

</html>