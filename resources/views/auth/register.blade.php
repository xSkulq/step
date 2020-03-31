@php
  $title = '新規登録';
  $description = '新規登録画面です。学び方がわからない人はぜひ、メールアドレス・パスワードを登録し色々な人のSTEPを頼りに学んでみてはいかがでしょう';
@endphp
@extends('layouts.app_auth')

@section('content')
<div class="p-singup">
  <div>
    <h1 class="p-singup__title">新規登録</h1>

      <form method="POST" action="{{ route('register') }}" class="p-singup__form">
        @csrf

        {{-- Email --}}
        <div>
          <label class="p-singup__font" for="email">
            <div class="u-flex__space">
              <span>メールアドレス</span>

              @error('email')
              <span class="c-inputFild__error" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="u-mt5 u-mb20">
              <input id="email" type="email" class=" c-inputFild @error('email') c-inputFild-error is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            </div>
          </label>
        </div>

        {{-- Password --}}
        <div>
          <label class="p-singup__font" for="password">
            <div class="u-flex__space">
              <span>パスワード</span>

              @error('password')
              <span class="c-inputFild__error" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

          <div class="u-mt5 u-mb20">
            <input id="password" type="password" class="c-inputFild @error('password') c-inputFild-error is-invalid @enderror" name="password" required autocomplete="new-password">
          </div>
        </label>
        </div>

        {{-- Password_confirmation --}}
        <div> 
          <label class="p-singup__font" for="password-confirm">
            パスワード(再確認)

          <div class="u-mt5 u-mb50">
            <input id="password-confirm" type="password" class="c-inputFild" name="password_confirmation" required autocomplete="new-password">
          </div>
        </label>
        </div>

        {{-- button --}}
        <div class="u-flex__center">
          <button type="submit" class="c-button p-singup__button-font p-singup__button">
            登録
          </button>
        </div>

        {{-- ログインページに遷移 --}}
        <div class="u-flex__center u-mb25">
          <a href="{{ route('login') }}" class="p-singup__link">既に登録している方はこちら</a>
        </div>
      </form>
    </div>
</div>
@endsection
