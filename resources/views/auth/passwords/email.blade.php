@extends('layouts.app_auth')

@section('content')
<div class="p-email">
  <div>
    <h1 class="p-email__title">パスワードリセット</h1>
    <p class="p-email__font">ご登録されているメールアドレスをご入力ください</p>
    <p class="p-email__font u-mb65">パスワード再設定用のご案内のメールを送ります</p>

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif

        {{-- Email --}}
        <div class="u-mb55">
          <label for="email" class="p-email__label">メールアドレス</label>

          <div>
            <input id="email" type="email" class="c-inputFild @error('email') c-inputFild-error is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span role="alert" class="c-inputFild__error">{{-- errorのスタイルはあとでやる --}}
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        {{-- button --}}
        <div class="u-flex__center u-mb30">
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
