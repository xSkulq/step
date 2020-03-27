@php
  $title = '404エラー';
@endphp
@extends('layouts.app_auth')

@section('content')

@auth
<div class="p-404">
  <h1 class="p-404__title">指定したページが見つかりません</h1>
  <p class="p-404__font">ボタンをクリックしたらマイページに戻ります</p>
  <div class="u-flex__center">
    <a href="{{ route('step.index')}}" class="p-404__button c-button">マイページ画面に戻る</a>
  </div>
</div>
@endauth

@guest
<div class="p-404">
  <h1 class="p-404__title">指定したページが見つかりません</h1>
  <p class="p-404__font">ボタンをクリックしたらログイン画面に戻ります</p>
  <div class="u-flex__center">
    <a href="{{ route('login')}}" class="p-404__button c-button">ログイン画面に戻る</a>
  </div>
</div>
@endguest

@endsection