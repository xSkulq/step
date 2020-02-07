@extends('layouts.app_auth')

@section('content')
<div class="p-reset">
  <div>
    <h1 class="p-reset__title">パスワードリセット</h1>

      <form method="POST" action="{{ route('password.update') }}">
        @csrf

          <input type="hidden" name="token" value="{{ $token }}">

          {{-- Email --}}
          <div>
            <label for="email" class="p-reset__label">メールアドレス</label>

              <div class="u-mt5 u-mb20">
                <input id="email" type="email" class="c-inputFild @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="c-inputFild__error" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
          </div>

          {{-- Password --}}
          <div>
            <label for="password" class="p-reset__label">パスワード</label>

            <div class="u-mt5 u-mb20">
              <input id="password" type="password" class="c-inputFild @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
              <span class="c-inputFild__errror" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          {{-- Password_confirmation --}}
          <div>
            <label for="password-confirm" class="p-reset__label">パスワード(再確認)</label>

            <div class="u-mt5 u-mb50">
              <input id="password-confirm" type="password" class="c-inputFild" name="password_confirmation" required autocomplete="new-password">
            </div>
          </div>

          {{-- button --}}
          <div class="u-flex__center u-mb40">
            <button type="submit" class="c-button p-reset__button-font">
              送信
            </button>
          </div>

          {{-- ログインページに遷移 --}}
          <div class="u-flex__center">
            <a href="{{route('login')}}" class="p-reset__link">ログインへ戻る</a>
          </div>
      </form>
    </div>
</div>
@endsection
