@php
  $title = 'プロフィール編集';
  $description = 'プロフィール編集画面です。メールアドレス・名前・自己紹介・アイコン画像などを登録してみてください';
@endphp
@extends('layouts.app')

@section('content')
<div class="p-account_edit">
<form method="POST" action="{{ route('account.store') }}" enctype="multipart/form-data" class="p-account_edit__form">
  @csrf
  <div> 
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

    <!-- icon -->
    <div>
      <div class="u-flex__space u-mb5">
        <p>アイコン<span class="p-account_edit__note">*512KB以下</span></p>
        @error('pic')<div class="c-inputFild__error">{{ $message }}</div>@enderror
      </div>
      
        <label for="icon">
          <div>
            <input type="submit" name="img_destory" class="p-child_edit__img__destory" value="保存していた画像を削除します">
          </div>
          <account-img-preview :prev_img={{ json_encode($user->pic) }}></account-img-preview>
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
</div>
@endsection
