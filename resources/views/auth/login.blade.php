@extends('layouts.app_auth')

@section('content')
<div class="p-login">
  <div>
    <h1 class="p-login__title">ログイン</h1>

      <form method="POST" action="{{ route('login') }}">
        @csrf

				{{-- Email --}}
        <div>
          <label class="p-login__font" for="email">メールアドレス</label>

            <div class="u-mt5 u-mb20">
              <input id="email" type="email" class="c-inputFild @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="c-inputFild__error" role="alert"><!-- TODO: エラーのスタイルはあとでやる  -->
                	<strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

				{{-- Password --}}
        <div>
          <label class="p-login__font" for="password">パスワード</label>

            <div class="u-mt5 u-mb10">
              <input id="password" type="password" class="c-inputFild @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

              @error('password')
              <span class="c-inputFild__error" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
        </div>

				<div class="u-flex__space u-mb45">
					{{-- ログイン保持ボックス --}}
					<div class="p-login__checkbox">
						<label>
							<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

							<span class="p-login__checkbox-font .u-flex__center">
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
				<div class="u-flex__center">
					<a class="p-login__link" href="{{ route('register') }}">まだアカウントをお持ちでない方はこちら</a>
				</div>
      </form>
  </div>
</div>
@endsection
