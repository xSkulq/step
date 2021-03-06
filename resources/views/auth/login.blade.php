@php
  $title = 'ログイン';
  $description = 'ログイン画面です。メールアドレスとパスワードを記入しログインしてください';
@endphp
@extends('layouts.app_auth')

@section('content')
<div class="p-login">
  <div>
    <h1 class="p-login__title">ログイン</h1>

      <form method="POST" action="{{ route('login') }}" class="p-login__form">
        @csrf

				{{-- Email --}}
        <div>
          <label class="p-login__font" for="email">
            <div class="u-flex__space">
              <p>メールアドレス</p>
              @error('email')
              <span class="c-inputFild__error" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="u-mt5 u-mb20">
              <input id="email" type="email" class="c-inputFild @error('email') c-inputFild-error is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>
          </label>
        </div>

				{{-- Password --}}
        <div>
          <label class="p-login__font" for="password">
            <div class="u-flex__space">
              <p>パスワード</p>
              @error('password')
              <span class="c-inputFild__error" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="u-mt5 u-mb10">
              <input id="password" type="password" class="c-inputFild @error('password') c-inputFild-error is-invalid @enderror" name="password" required autocomplete="current-password">
            </div>
          </label>
        </div>

				<div class="u-flex__space u-mb45">
					{{-- ログイン保持ボックス --}}
					<div class="p-login__checkbox">
						<label>
							<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="c-inputFild__checkbox">

							<span class="p-login__checkbox-font .u-flex__center c-inputFild__checkbox__check">
							</span>
						</label>
					</div>
					
					{{-- Passwordリマインダー --}}
					@if (Route::has('password.request'))
						<div>
							<a class="p-login__link" href="{{ route('password.request') }}">
								パスワードをお忘れの方
							</a>
						</div>
					@endif
				</div>

				{{-- ボタン --}}
        <div class="u-flex__center">
            <button class="c-button p-login__button-font p-login__button" type="submit">
							ログイン
						</button>
				</div>

					{{-- 新規登録のページに遷移 --}}
				<div class="u-flex__center u-mb25">
					<a class="p-login__link" href="{{ route('register') }}">まだアカウントをお持ちでない方はこちら</a>
				</div>
      </form>
  </div>
</div>
@endsection
