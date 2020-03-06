<!-- pc用画面のサイドバー -->
<div class="c-sidebar">
  <ul class="c-sidebar__list">
    <a class="c-sidebar__link" href="{{ route('step.index')}}">
      <li class="c-sidebar__item">
        <i class="fas fa-book"></i>
        <span>STEP一覧</span>
      </li>
    </a>
    <a class="c-sidebar__link" href="{{ route('step.new')}}">
      <li class="c-sidebar__item">
        <i class="fas fa-plus-circle"></i>
        <span>STEP登録</span>
      </li>
    </a>
    <a class="c-sidebar__link" href="{{ route('step.mypage_register')}}">
      <li class="c-sidebar__item">
        <i class="fas fa-file-alt"></i>
        <span>登録済みSTEP一覧</span>
      </li>
    </a>
    <a class="c-sidebar__link" href="{{ route('step.mypage_challenge')}}">
      <li class="c-sidebar__item">
        <i class="far fa-folder-open"></i>
        <span>チャレンジSTEP</span>
      </li>
    </a>
    <a class="c-sidebar__link" href="{{ route('account.edit')}}">
      <li class="c-sidebar__item">
        <i class="fas fa-users"></i>
        <span>プロフィール編集</span>
      </li>
    </a>
    <!--<a class="c-sidebar__link" href="">
      <li class="c-sidebar__item">
        <i class="fas fa-money-check"></i>
        <span>設定</span>
      </li>
    </a>-->
    <a class="c-sidebar__link" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      <li class="c-sidebar__item">
        <i class="fas fa-sign-out-alt"></i>
        <span>ログアウト</span>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </a>
  </ul>
</div>