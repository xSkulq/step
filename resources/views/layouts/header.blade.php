<header class="c-header">
  <div class="c-header__logo">logo</div><!-- TODO: あとでロゴに差し替える -->
  <!-- toggle -->
  <div class="menu-trigger js-toggle-sp-menu">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <!-- toggle時のサイドバー -->
  <div class="c-sidebar-sp">
    <ul class="">
      <li class="">
        <i class=""></i>
        <a class="" href="{{ route('step.index')}}">STEP一覧</a>
      </li>
      <li class="">
        <i class="fas fa-copy"></i>
        <a class="" href="{{ route('step.new')}}">STEP登録</a>
      </li>
      <li class="">
        <i class="fas fa-file-invoice"></i>
        <a class="" href="{{ route('step.mypage_register')}}">登録済みSTEP一覧</a>
      </li>
      <li class="">
        <i class="fas fa-users"></i>
      <a class="" href="{{ route('step.mypage_challenge')}}">チャレンジしているSTEP</a>
      </li>
      <li class="">
        <i class="fas fa-user-plus"></i>
        <a class="" href="{{ route('account.edit')}}">プロフィール編集</a>
      </li>
      <li class="">
        <i class="fas fa-money-check"></i>
        <a class="" href="">設定</a>
      </li>
      <li class="">
        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</header>