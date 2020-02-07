<div class="c-sidebar">
  <div class="c-sidebar__logo">STEP</div>
  <ul class="c-sidebar__list">
    <li class="c-sidebar__item">
      <i class="fas fa-tachometer-alt"></i>
      <a class="c-sidebar__link" href="{{ route('step.index')}}">STEP一覧</a>
    </li>
    <li class="c-sidebar__item">
      <i class="fas fa-copy"></i>
      <a class="c-sidebar__link" href="{{ route('step.new')}}">STEP登録</a>
    </li>
    <li class="c-sidebar__item">
      <i class="fas fa-file-invoice"></i>
      <a class="c-sidebar__link" href="{{ route('step.mypage_register')}}">登録済みSTEP一覧</a>
    </li>
    <li class="c-sidebar__item">
      <i class="fas fa-users"></i>
    <a class="c-sidebar__link" href="{{ route('step.mypage_challenge')}}">チャレンジしているSTEP</a>
    </li>
    <li class="c-sidebar__item">
      <i class="fas fa-user-plus"></i>
      <a class="c-sidebar__link" href="{{ route('account.edit')}}">プロフィール編集</a>
    </li>
    <li class="c-sidebar__item">
      <i class="fas fa-money-check"></i>
      <a class="c-sidebar__link" href="">設定</a>
    </li>
  </ul>
</div>