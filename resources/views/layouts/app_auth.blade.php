@include('layouts.head')
<body>
  <div id="app">
    <header>
      @include('layouts.header')
    </header>
    <div class="l-auth">
      <div class="l-auth__inner">
        <main>
          @yield('content')
        </main>
      </div>
    </div>
    <footer>
      @include('layouts.footer')
    </footer>
  </div>
</body>

</html>