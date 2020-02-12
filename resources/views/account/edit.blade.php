@extends('layouts.app_own_column')

@section('content')

  <div class="p-account_edit"> 
    <div>
      <h1 class="p-account_edit__title">プロフィール編集</h1>

      <form class="p-account_edit__form" method="POST" action="{{ route('account.store') }}">{{-- TODO: routeの部分は登録のルーティングにあとで変える --}}
        @csrf

        {{-- Email --}}
        <div>
          <label for="email" class="p-account_edit__font">メールアドレス</label>

          <div class="u-mt5 u-mb20">
            @error('email')<div class="">{{ $message }}</div>@enderror
            <input type="email" name="email" class="c-inputFild__long" placeholder="メールアドレス" value="{{ $user->email }}">
          </div>
        </div>

        {{-- name --}}
        <div>
          <label for="name" class="p-account_edit__font">名前</label>

          <div class="u-mt5 u-mb20">
            <input type="name" name="name" class="c-inputFild__long" placeholder="名前" value="{{ $user->name }}">
          </div>
        </div>

        {{-- 自己紹介文 --}}
        <div>
          <label for="content" class="p-account_edit__font">自己紹介</label>

          <div class="u-mt5 u-mb20">
            <textarea name="bio" cols="30" rows="10" class="c-inputFild__textarea p-account_edit__textarea" placeholder="自己紹介">{{ $user->bio }}</textarea>
          </div>
        </div>

        {{-- アイコン --}}
        <div>
          <label for="icon" class="p-account_edit__font">アイコン</label>{{-- TODO: アイコンのスタイルは機能を作るときにやる --}}
          <div class="u-mt5 u-mb80">
            <input type="file" name="pic">
            <div>
              <img src="{{ $user->pic }}" alt="">
            </div>
          </div>
        </div>

				{{-- ボタン --}}
        <div class="u-mb55 u-flex__center">
          <button class="c-button p-account_edit__button-font" type="submit">
            保存
          </button>
        </div>

      </form>
    </div>
    
  </div>
@endsection
