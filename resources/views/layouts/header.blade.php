<header class="c-header">
  <div class="c-header__logo">logo</div><!-- TODO: あとでロゴに差し替える -->
  <!-- toggle -->
  <div class="menu-trigger js-toggle-sp-menu">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <!-- toggle時のサイドバー -->
  <div class="c-sidebar-sp js-toggle-sp-menu-target">
    <ul class="c-sidebar-sp__list">
      <a class="c-sidebar-sp__link" href="{{ route('step.index')}}">
      <li class="c-sidebar-sp__item">
        <i class="fas fa-tachometer-alt"></i>
        <span>STEP一覧</span>
      </li>
      </a>
      <a class="c-sidebar-sp__link" href="{{ route('step.new')}}">
      <li class="c-sidebar-sp__item">
        <i class="fas fa-copy"></i>
        <span>STEP登録</span>
      </li>
      </a>
      <a class="c-sidebar-sp__link" href="{{ route('step.mypage_register')}}">
      <li class="c-sidebar-sp__item">
        <i class="fas fa-file-invoice"></i>
        <span>登録済みSTEP一覧</span>
      </li>
      </a>
      <a class="c-sidebar-sp__link " href="{{ route('step.mypage_challenge')}}">
      <li class="c-sidebar-sp__item">
        <i class="fas fa-users"></i>
      <span>チャレンジSTEP</span>
      </li>
      </a>
      <a class="c-sidebar-sp__link" href="{{ route('account.edit')}}">
      <li class="c-sidebar-sp__item">
        <i class="fas fa-user-plus"></i>
        <span>プロフィール編集</span>
      </li>
      </a>
      <a class="c-sidebar-sp__link" href="">
      <li class="c-sidebar-sp__item">
        <i class="fas fa-money-check"></i>
        <span>設定</span>
      </li>
      </a>
      <li class="c-sidebar-sp__item">
        <a class="c-sidebar-sp__link" href="{{ route('logout') }}" onclick="event.preventDefault();
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