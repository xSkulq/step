@php
  $title = '子STEP新規登録';
  $description = '子STEP新規登録画面です。タイトル・内容・画像を保存してください';
@endphp
@extends('layouts.app')

@section('content')
<div class="p-child_register">

  <!-- main -->
  <h1 class="p-child_register__title">子STEP新規登録</h1>

  <!-- step-list -->
  <form method="POST" action="{{ route('step.child_store',$stepId) }}" class="p-child_register__form" enctype="multipart/form-data">
    @csrf

    {{-- title --}}
    <div>
      <label for="title" class="p-child_register__label">
        <div class="u-flex__space">
          <p>タイトル</p>
          @error('title')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="p-child_register__input">
          <input name="title" type="text" class="c-inputFild__long @error('title') c-inputFild__long-error @enderror" 
                 placeholder="タイトル"　value="{{ old('title') }}">
        </div>
      </label>
    </div>

    {{-- STEPの内容 --}}
    <div>
      <label for="content" class="p-child_register__font">
        <div class="u-flex__space">
          <p>内容</p>
          @error('content')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5">
          <textarea name="content" cols="30" rows="10" class="c-inputFild__textarea p-child_register__textarea @error('content') c-inputFild__textarea-error @enderror" placeholder="内容"></textarea>
        </div>
      </label>
    </div>

    {{-- img --}}
    <div>
      <div class="u-flex__space u-mb5">
        <p>STEPのTOP画像<span class="p-child_register__required">*512KB以下</span></p>
        @error('pic')<div class="c-inputFild__error">{{ $message }}</div>@enderror
      </div>
        
      <div>
        <label for="icon">
          <step-img-preview></step-img-preview>
        </label>
      </div>
    </div>

    {{-- ボタン --}}
    <div class="u-flex__center">
      <button class="c-button p-child_register__button-font" type="submit">
        保存
      </button>
    </div>

  </form>
</div>

@endsection