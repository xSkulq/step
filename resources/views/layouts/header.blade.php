<header class="c-header">
  <div>
    <a href="{{ url('/') }}" class="c-header__logo">
      <img src="{{ asset('/imges/logo1.png') }}" alt="">
    </a><!-- TODO: あとでロゴに差し替える -->
  </div>
  <div class="u-flex">
    <div>
      <a href="{{ route('register')}}" class="c-header__button">新規登録</a>
    </div>
    <div>
      <a href="{{ route('login')}}" class="c-header__button c-header__button-white">ログイン</a>
    </div>
  </div>
</header>