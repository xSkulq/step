<!-- ログインしていない場合 -->
@guest
<div class="c-header">
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
</div>

<!-- ログインしている場合 -->
@else
<div class="c-header">
  <div class="c-header__left">
  <!-- toggle -->
  <div class="menu-trigger js-toggle-sp-menu">
    <span></span>
    <span></span>
    <span></span>
  </div>
  
  <!-- spのsidebar -->
  @include('layouts.sidebar_sp')

  <!-- ロゴ -->
  <div class="c-header__logo">
    <a href="{{ url('/') }}">
      <img src="{{ asset('/imges/logo1.png') }}" alt="STEP(ロゴ)" class="c-header__logo__img">
    </a>
  </div>
  </div>

  <!-- ボタン系統 -->
  <div class="u-flex">
    <div>
      <a href="{{ route('step.index')}}" class="c-header__button">STEP一覧</a>
    </div>
    <div class="c-header__none">
      <a href="{{ route('step.new')}}" class="c-header__button c-header__button-white">STEP登録</a> 
    </div>
    <div>
      <a href="{{ route('logout')}}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();" class="c-header__button c-header__button-white">
        ログアウト
      </a>
    </div>
  </div>
</div>
@endguest