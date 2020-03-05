@include('layouts.head')
<body>
  <div id="app">
    <header>
      @include('layouts.header')
    </header>
    <div class="l-lp">
      <div class="">
        <main>
          @yield('content')
        </main>
      </div>
    </div>
  </div>
</body>

</html>