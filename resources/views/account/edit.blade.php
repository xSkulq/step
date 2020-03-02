@extends('layouts.app_own_column')

@section('content')
<form method="POST" action="{{ route('account.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="p-account_edit"> 
    <h1 class="p-account_edit__title">プロフィール編集</h1>

    <!-- email -->
    <div>
      <label for="email" class="p-account_edit__font">メールアドレス</label>

        <div class="u-mt5 u-mb20">
          @error('email')<div class="">{{ $message }}</div>@enderror
          <input type="email" name="email" class="c-inputFild__long" placeholder="メールアドレス" value="{{ $user->email }}">
        </div>
    </div>

    <!-- name -->
    <div>
      <label for="name" class="p-account_edit__font">名前</label>
        <div class="u-mt5 u-mb20">
          @error('name')<div class="">{{ $message }}</div>@enderror
          <input type="name" name="name" class="c-inputFild__long" placeholder="名前" value="{{ $user->name }}">
        </div>
    </div>

    <!-- bio -->
    <div>
      <label for="content" class="p-account_edit__font">自己紹介</label>
      <div class="u-mt5 u-mb20">
        @error('bio')<div class="">{{ $message }}</div>@enderror
        <textarea name="bio" cols="30" rows="10" class="c-inputFild__textarea p-account_edit__textarea" placeholder="自己紹介">{{ $user->bio }}</textarea>
      </div>
    </div>

    <!-- icon -->
    <div>
      <span>アイコン</span>
      <div class="p-account_edit__icon">
        <label for="icon">
          <input type="file" name="pic" class="p-account_edit__file">
          @if(empty($user->pic))
          <img alt="no_icon" class="p-account_edit__img" src="/imges/no_image.png">
          @else
          <img alt="アイコン" class="p-account_edit__img" src="/{{ $user->pic }}">
          @endif
            <!--<img alt="" class="p-account_edit__img" v-bind:src="'/' + user_edit.pic">-->
        </label>
      </div>
    </div><!-- TODO: 画像の削除ボタンを後で作る -->
    @error('pic')<div class="">{{ $message }}</div>@enderror
    <!-- button -->
    <div class="u-mb55 u-flex__center">
      <button class="c-button p-account_edit__button-font" type="submit">
        保存
      </button>
    </div>
  </div>
</form>
@endsection
