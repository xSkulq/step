@extends('layouts.app_auth')

@section('content')

@auth
<div class="p-500">
  <h1 class="p-500__title">指定したSTEPまたは子STEPが見つかりません</h1>
  <p class="p-500__font">ボタンをクリックしたら前のページに戻ります</p>
  <div class="u-flex__center">
    <a href="javascript:history.back()" class="p-500__button c-button">前のページに戻る</a>
  </div>
</div>
@endauth

@guest
<div class="p-500">
  <h1 class="p-500__title">指定したページが見つかりません</h1>
  <p class="p-500__font">ボタンをクリックしたらログイン画面に戻ります</p>
  <div class="u-flex__center">
    <a href="{{ route('login')}}" class="p-500__button c-button">ログイン画面に戻る</a>
  </div>
</div>
@endguest

@endsection