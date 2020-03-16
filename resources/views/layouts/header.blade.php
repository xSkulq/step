<header class="c-header">
  <div>
    <a href="{{ url('/') }}">
      <img src="{{ asset('/imges/logo1.png') }}" alt="STEP(ロゴ)" class="c-header__logo">
    </a>
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