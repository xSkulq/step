@include('layouts.head')
<body>
  <div id="app">
    @include('layouts.sidebar_sp')
    <div class="l-content">
          <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
    <div class="c-flash js-flash-message" role="alert">
      {{ session('flash_message') }}
    </div>
  @endif
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