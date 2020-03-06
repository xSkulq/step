@extends('layouts.app_own_column')

@section('content')
<div class="p-child_register">

  <!-- main -->
  <h1 class="p-child_register__title">子STEP編集</h1>

  <!-- step-list -->
  <form method="POST" action="{{ route('step.child_update',$stepChild->id) }}">{{-- TODO: routeの部分は登録のルーティングにあとで変える --}}
    @csrf

    {{-- title --}}
    <div>
      <label for="title" class="p-child_register__label">
        <div class="u-flex__space">
          <span>タイトル</span>
          @error('title')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5 u-mb70">
          <input name="title" type="text" class="c-inputFild__long @error('title') c-inputFild__long-error @enderror" 
                 placeholder="タイトル"　value="@if(!empty(old('title'))){{ old('title')}}@else{{ $stepChild->title }}@endif">
        </div>
      </label>
    </div>

    {{-- STEPの内容 --}}
    <div>
      <label for="content" class="p-child_register__font">
        <div class="u-flex__space">
          <span>内容</span>
          @error('content')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5">
          <textarea name="content" cols="30" rows="10" class="c-inputFild__textarea p-child_register__textarea @error('content') c-inputFild__textarea-error @enderror" placeholder="内容">@if(!empty(old('content'))){{ old('content')}}@else{{ $stepChild->content }}@endif</textarea>
        </div>
      </label>
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