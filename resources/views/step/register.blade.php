@php
    $title = 'STEP新規登録';
@endphp
@extends('layouts.app')

@section('content')
<div class="p-step_register">

  <!-- main -->
  <h1 class="p-step_register__title">STEP新規登録</h1>

  <p class="p-step_register__note">*STEPと子STEP1を登録してください</p>
  <p class="p-step_register__sub-title">STEPを登録</p>

  <form method="POST" action="{{ route('step.store') }}" class="p-step_register__form" enctype="multipart/form-data">
    @csrf

    {{-- STEP --}}
    <div>
      {{-- title --}}
      <div>
        <label for="title" class="p-step_register__label">
          <div class="u-flex__space">
            <p>タイトル<span class="p-step_register__required">*必須</span></p>
            @error('title')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-mt5 u-mb25">
            <input type="text" name="title" class="c-inputFild__long @error('title') c-inputFild__long-error @enderror" placeholder="英語を最速で学ぶ方法" value="{{ old('title') }}">
          </div>
        </label>
      </div>

      {{-- STEPカテゴリ --}}
      <div>
        <label for="category" class="p-step_register__label">
          <div class="u-flex__space">
            <p>STEPカテゴリ<span class="p-step_register__required">*必須</span></p>
            @error('category_id')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="p-step_register__select__category @error('category_id') p-step_register__select__error @enderror">
            <!-- categoryセレクト -->
            {{ Form::select('category_id', $categories, null, ['class' => 'c-select', 'id' => 'category_id']) }}
          </div>
        </label>
      </div>

      {{-- 目安達成時間 --}}
      <div>
        <label for="criterion" class="p-step_register__label">
          <div>
            <p class="u-mb10">目安達成時間<span class="p-step_register__required">(半角数字で入力してください)</span><span class="p-step_register__required">*必須</span></p>
            <div class="u-flex__space">
            @error('achievement_number')<div class="c-inputFild__error">{{ $message }}</div>@enderror
            @error('time')<div class="c-inputFild__error">{{ $message }}</div>@enderror
            </div>
          </div>

          <div class="u-flex">
            <div class="u-mt5 u-mb25">
              <input type="text" name="achievement_number" class="c-inputFild__long p-step_register__input__time @error('achievement_number') c-inputFild__long-error @enderror" placeholder="12" value="{{ old('achievement_number') }}">
            </div>
            <div class="p-step_register__select__time @error('time') p-step_register__select__error @enderror">
              <select name="time" class="c-select">
                <option @if(old('time') === '') selected="selected"@endif value="">選択</option>
                <option @if(old('time') === '分') selected="selected"@endif value="分">分</option>
                <option @if(old('time') === '時間') selected="selected"@endif value="時間">時間</option>
                <option @if(old('time') === '日') selected="selected"@endif value="日">日</option>
                <option @if(old('time') === 'ヶ月') selected="selected"@endif value="ヶ月">ヶ月</option>
                <option @if(old('time') === '年') selected="selected"@endif value="年">年</option>
              </select>
            </div>
          </div>
        </label>
      </div>

      {{-- STEPの内容 --}}
      <div>
        <label for="content" class="p-account_edit__font">
          <div class="u-flex__space">
            <p>内容<span class="p-step_register__required">*必須</span></p>
            @error('content')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-mt5 u-mb25">
            <textarea name="content" cols="30" rows="10" class="c-inputFild__textarea p-step_register__textarea @error('content') c-inputFild__textarea-error @enderror" placeholder="英語をなるべく早く学べるように学ぶ順番を書いてみました">{{ old('content') }}</textarea>
          </div>
        </label>
      </div>

      {{-- img --}}
      <div>
        <div class="u-flex__space u-mb5">
          <p>STEPのTOP画像<span class="p-step_register__required">*512KB以下</span></p>
          @error('pic')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>
  
        <!--<div class="p-step_register__icon-destory">
          <label>
          <i class="far fa-times-circle p-step_register__icon-destory__pointer"></i>
          <input type="submit" name="img_destory" class="p-step_register__img-destory" value="アイコンを削除します">
          </label>
        </div>-->
        
        <div>
          <label for="icon">
            <step-img-preview></step-img-preview>
            <!--<input type="file" name="pic" class="p-step_register__file">-->
            <!--if(empty($user->pic))-->
            <!--<img alt="no_icon" class="p-step_register__img" src="/imges/no_image.png">-->
            <!--else-->
            <!--<img alt="アイコン" class="p-step_register__img" src="data:image/png;base64,">-->
            <!-- 画像プレビューの機能を後で追加する -->
            <!--<img alt="アイコン" class="p-step_register__img" src="data:image/png;base64,">-->
            <!--endif-->
          </label>
        </div>
      </div>
    </div>

    {{-- border --}}
    <div class="p-step_register__border"></div>

    {{-- 子STEP1 --}}
    <div>
      <p class="p-step_register__sub-title">子STEP1を登録</p>
      {{-- title --}}
      <div class="u-mb25">
        <label for="title" class="p-step_register__label">
          <div class="u-flex__space">
            <p>タイトル<span class="p-step_register__required">*必須</span></p>
            @error('child_title')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-mt5 5">
            <input type="text" name="child_title" class="c-inputFild__long @error('child_title') c-inputFild__long-error @enderror" placeholder="〇〇本を読もう！！" value="{{ old('child_title') }}">
          </div>
        </label>
      </div>

      {{-- STEPの内容 --}}
      <div>
        <label for="content" class="p-account_edit__font">
          <div class="u-flex__space">
            <p>内容<span class="p-step_register__required">*必須</span></p>
            @error('child_content')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-mt5 u-mb25">
            <textarea name="child_content" cols="30" rows="10" class="c-inputFild__textarea p-step_register__textarea @error('child_content') c-inputFild__textarea-error @enderror" placeholder="〇〇の本は簡単な英語しか書いてなく読みやすいので勉強になります">{{ old('child_content') }}</textarea>
          </div>
        </label>
      </div>

      {{-- img --}}
      <div>
        <div class="u-flex__space u-mb5">
          <p>子STEP1のTOP画像<span class="p-step_register__required">*512KB以下</span></p>
          @error('child_pic')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>
  
        <!--<div class="p-step_register__icon-destory">
          <label>
          <i class="far fa-times-circle p-step_register__icon-destory__pointer"></i>
          <input type="submit" name="child_img_destory" class="p-step_register__img-destory" value="アイコンを削除します">
          </label>
        </div>-->
        
        <div>
          <label for="icon">
            <child-img-preview></child-img-preview>
          </label>
        </div>
      </div>

    {{-- ボタン --}}
    <div class="u-flex__center">
      <button class="c-button p-step_register__button-font" type="submit">
        保存
      </button>
    </div>

  </form>
  
</div>

@endsection