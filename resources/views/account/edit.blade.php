@extends('layouts.app_own_column')

@section('content')
<form method="POST" action="{{ route('account.store') }}" enctype="multipart/form-data" class="p-account_edit__form">
  @csrf
  <div class="p-account_edit"> 
    <h1 class="p-account_edit__title">プロフィール編集</h1>

    <!-- email -->
    <div>
      <label for="email" class="p-account_edit__font">
        <div class="u-flex__space">
          <p>メールアドレス</p>
          @error('email')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5 u-mb20">
          <input type="email" name="email" class="c-inputFild__long @error('email') c-inputFild__long-error @enderror" 
                 placeholder="メールアドレス" value="{{ $user->email }}">
        </div>
      </label>
    </div>

    <!-- name -->
    <div>
      <label for="name" class="p-account_edit__font">
        <div class="u-flex__space">
          <p>名前<p>
          @error('name')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>
        <div class="u-mt5 u-mb20">
          <input type="name" name="name" class="c-inputFild__long @error('name') c-inputFild__long-error @enderror" 
                 placeholder="名前" value="{{ $user->name }}">
        </div>
      </label>
    </div>

    <!-- bio -->
    <div>
      <label for="content" class="p-account_edit__font">
        <div class="u-flex__space">
          <p>自己紹介<p>
          @error('bio')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>
        <div class="u-mt5 u-mb20">
          <textarea name="bio" cols="30" rows="10" class="c-inputFild__textarea p-account_edit__textarea @error('bio') c-inputFild__textarea-error @enderror" 
                    placeholder="自己紹介">{{ $user->bio }}</textarea>
        </div>
      </label>
    </div>

    <!-- icon --><!-- 余裕があれば非同期通信で画像をすぐに表示させたい -->
    <div>
      <div class="u-flex__space u-mb5">
        <p>アイコン<span class="p-account_edit__note">*512KB以下</span></p>
        @error('pic')<div class="c-inputFild__error">{{ $message }}</div>@enderror
      </div>

      <div class="p-account_edit__icon-destory">
        <label>
        <i class="far fa-times-circle p-account_edit__icon-destory__pointer"></i>
        <input type="submit" name="img_destory" class="p-account_edit__img-destory" value="アイコンを削除します">
        </label>
      </div>
      
      <div class="p-account_edit__icon">
        <label for="icon">
          <input type="file" name="pic" class="p-account_edit__file">
          @if(empty($user->pic))
          <img alt="no_icon" class="p-account_edit__img" src="/imges/no_image.png">
          @else
          <!--<img alt="アイコン" class="p-account_edit__img" src="data:image/png;base64,">-->
          <img alt="アイコン" class="p-account_edit__img" src="/storage/{{ $user->pic }}">
          @endif
        </label>
      </div>
    </div>
    <!-- button -->
    <div class="u-mb55 u-flex__center">
      <button class="c-button p-account_edit__button-font" type="submit">
        保存
      </button>
    </div>
  </div>
</form>
@endsection
