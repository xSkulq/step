
  <!-- toggle時のサイドバー -->
  <div class="c-sidebar-sp js-toggle-sp-menu-target">
    <ul class="c-sidebar-sp__list">
      <a class="c-sidebar-sp__link" href="{{ route('step.index')}}">
      <li class="c-sidebar-sp__item">
        <i class="fas fa-book"></i>
        <p class="u-ml5">STEP一覧</p>
      </li>
      </a>
      <a class="c-sidebar-sp__link" href="{{ route('step.new')}}">
      <li class="c-sidebar-sp__item">
        <i class="fas fa-plus-circle"></i>
        <p class="u-ml5">STEP登録</p>
      </li>
      </a>
      <a class="c-sidebar-sp__link" href="{{ route('step.mypage_challenge')}}">
        <li class="c-sidebar-sp__item">
          <i class="far fa-folder-open"></i>
          <p class="u-ml5">マイページ</p>
        </li>
      </a>
      <a class="c-sidebar-sp__link" href="{{ route('step.mypage_register')}}">
      <li class="c-sidebar-sp__item">
        <i class="fas fa-file-alt"></i>
        <p class="u-ml5">登録済みSTEP一覧</p>
      </li>
      </a>
      <a class="c-sidebar-sp__link" href="{{ route('account.edit')}}">
      <li class="c-sidebar-sp__item">
        <i class="fas fa-users"></i>
        <p class="u-ml5">プロフィール編集</p>
      </li>
      </a>
      <a class="c-sidebar-sp__link" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      <li class="c-sidebar__item">
        <i class="fas fa-sign-out-alt"></i>
        <p class="u-ml5">ログアウト</p>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </a>
    </ul>
  </div>