@extends('layouts.app_own_column')

@section('content')
<div class="p-child_register">

  <!-- main -->
  <h1 class="p-child_register__title">子STEP登録</h1>

  <!-- step-list -->
  <form method="POST" action="{{ route('step.child_store',$stepId) }}">{{-- TODO: routeの部分は登録のルーティングにあとで変える --}}
    @csrf

    {{-- title --}}
    <div>
      <label for="title" class="p-child_register__label">タイトル</label>

      <div class="u-mt5 u-mb70">
        @error('title')<div class="">{{ $message }}</div>@enderror
        <input name="title" type="text" class="c-inputFild__long" placeholder="タイトル"　value="{{ old('title') }}">
      </div>
    </div>

    {{-- STEPの内容 --}}
    <div>
      <label for="content" class="p-child_register__font">内容</label>

      <div class="u-mt5">
        @error('content')<div class="">{{ $message }}</div>@enderror
        <textarea name="content" cols="30" rows="10" class="c-inputFild__textarea p-child_register__textarea" placeholder="内容"></textarea>
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