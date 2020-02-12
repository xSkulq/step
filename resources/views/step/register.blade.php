@extends('layouts.app_own_column')

@section('content')
<div class="p-step_register">

  <!-- main -->
  <h1 class="p-step_register__title">STEP新規登録</h1>

  <form action="POST" method="{{ route('step.store') }}">{{-- TODO: routeの部分は登録のルーティングにあとで変える --}}

    {{-- title --}}
    <div>
      <label for="title" class="p-step_register__label">タイトル</label>

      <div class="u-mt5 u-mb20">
        <input type="text" class="c-inputFild__long" placeholder="タイトル">
      </div>
    </div>

    {{-- STEPカテゴリ --}}
    <div>
      <label for="category" class="p-step_register__label">STEPカテゴリ</label>

      <div class="u-mt5 u-mb20">
        <input type="text" class="c-inputFild__long" placeholder="STEPカテゴリ">
      </div>
    </div>

    {{-- 目安達成時間 --}}
    <div>
      <label for="criterion" class="p-step_register__label">目安達成時間</label>

      <div class="u-mt5 u-mb20">
        <input type="text" class="c-inputFild__long" placeholder="目安達成時間">
      </div>
    </div>

    {{-- STEPの内容 --}}
    <div>
      <label for="content" class="p-account_edit__font">内容</label>

      <div class="u-mt5 u-mb55">
        <textarea name="content" cols="30" rows="10" class="c-inputFild__textarea p-step_register__textarea" placeholder="内容"></textarea>
      </div>
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