@extends('layouts.app_own_column')

@section('content')
<div class="p-child_register">

  <!-- main -->
  <h1 class="p-child_register__title">子STEP登録</h1>

  <!-- step-list -->
  <form action="POST" method="{{ route('step.new') }}">{{-- TODO: routeの部分は登録のルーティングにあとで変える --}}

    {{-- title --}}
    <div>
      <label for="title" class="p-child_register__label">タイトル</label>

      <div class="u-mt5 u-mb70">
        <input type="text" class="c-inputFild__long" placeholder="タイトル">
      </div>
    </div>

    {{-- STEPの内容 --}}
    <div>
      <label for="content" class="p-child_register__font">内容</label>

      <div class="u-mt5">
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