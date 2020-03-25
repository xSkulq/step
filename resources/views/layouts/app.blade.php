@include('layouts.head')
<body>
  <div id="app">
    <header>
      @include('layouts.header')
    </header>
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
        <main class="l-main u-flex">
          @yield('content')
        </main>
      </div>
    </div>
  </div>
  <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>

</html>