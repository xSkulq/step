@extends('layouts.app_own_column')

@section('content')
<div class="p-step_register">

  <!-- main -->
  <h1 class="p-step_register__title">STEP新規登録</h1>

  <form method="POST" action="{{ route('step.store') }}" class="p-step_register__form">{{-- TODO: routeの部分は登録のルーティングにあとで変える --}}
    @csrf

    {{-- title --}}
    <div>
      <label for="title" class="p-step_register__label">
        <div class="u-flex__space">
          <span>タイトル</span>
          @error('title')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5 u-mb20">
          <input type="text" name="title" class="c-inputFild__long @error('title') c-inputFild__long-error @enderror" placeholder="タイトル" value="{{ old('title') }}">
        </div>
      </label>
    </div>

    {{-- STEPカテゴリ --}}
    <div>
      <label for="category" class="p-step_register__label">
        <div class="u-flex__space">
          <span>STEPカテゴリ</span>
          @error('category')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5 u-mb20">
          <input type="text" name="category" class="c-inputFild__long @error('category') c-inputFild__long-error @enderror" placeholder="STEPカテゴリ" value="{{ old('category') }}">
        </div>
      </label>
    </div>

    {{-- 目安達成時間 --}}
    <div>
      <label for="criterion" class="p-step_register__label">
        <div class="u-flex__space">
          <span>目安達成時間</span>
          @error('achievement_time')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5 u-mb20">
          <input type="text" name="achievement_time" class="c-inputFild__long @error('achievement_time') c-inputFild__long-error @enderror" placeholder="目安達成時間" value="{{ old('achievement_time') }}">
        </div>
      </label>
    </div>

    {{-- STEPの内容 --}}
    <div>
      <label for="content" class="p-account_edit__font">
        <div class="u-flex__space">
          <span>内容</span>
          @error('content')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5 u-mb55">
          <textarea name="content" cols="30" rows="10" class="c-inputFild__textarea p-step_register__textarea @error('content') c-inputFild__textarea-error @enderror" placeholder="内容">{{ old('content') }}</textarea>
        </div>
      </label>
    </div>

    {{-- ボタン --}}
    <div class="u-mb55 u-flex__center">
      <button class="c-button p-step_register__button-font" type="submit">
        保存
      </button>
    </div>

  </form>
  
</div>

@endsection