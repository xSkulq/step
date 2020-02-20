@extends('layouts.app')

@section('content')
<div class="p-step_mypage">

  <!-- main -->
  <h1 class="p-step_mypage__title">登録済みSTEP一覧</h1>
  <p class="p-step_mypage__category">カテゴリ</p>

  <!-- step-list -->
  <section>
    <mypage-register></mypage-register>
  </section>
</div>

@endsection