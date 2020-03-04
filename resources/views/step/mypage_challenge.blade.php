@extends('layouts.app')

@section('content')
<div class="p-step_mypage">

  <!-- main -->
  <h1 class="p-step_mypage__title u-mb80">チャレンジSTEP</h1>
  <!--<p class="p-step_mypage__category">カテゴリ</p>-->

  <!-- step-list -->
  <section>
    <mypage-challenge></mypage-challenge>
  </section>
</div>

@endsection