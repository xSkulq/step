@php
  $title = 'パスワードリセット | メール送信';
@endphp
@extends('layouts.app_auth')

@section('content')
<div class="p-email">
  <div>
    <h1 class="p-email__title">パスワードリセット</h1>
    <p class="p-email__font">ご登録されているメールアドレスをご入力ください</p>
    <p class="p-email__font u-mb65">パスワード再設定用のご案内のメールを送ります</p>

      <form method="POST" action="{{ route('password.email') }}" class="p-email__form">
        @csrf

        @if (session('status'))
          <div class="p-email__alert" role="alert">
            {{ session('status') }}
          </div>
        @endif

        @error('email')
        <div role="alert" class="c-inputFild__error u-mb10">
          <strong>{{ $message }}</strong>
        </div>
        @enderror

        {{-- Email --}}
        <div class="u-mb55">
          <label for="email" class="p-email__label">
            <div class="u-flex__space">
              <span>メールアドレス</span>
            </div>

            <div>
              <input id="email" type="email" class="c-inputFild @error('email') c-inputFild-error is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
          </label>
        </div>

        {{-- button --}}
        <div class="u-flex__center u-mb40">
          <button type="submit" class="c-button p-email__button-font">
            送信
          </button>
        </div>

        {{-- ログイン画面に遷移 --}}
        <div class="u-flex__center">
          <a href="{{ route('login')}}" class="p-singup__link">ログインへ戻る</a>
        </div>
      </form>
    </div>
</div>
@endsection
