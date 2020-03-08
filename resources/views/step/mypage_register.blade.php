@extends('layouts.app')

@section('content')
<div class="p-step_mypage">

  <!-- main -->
  <h1 class="p-step_mypage__title u-mb80">登録済みSTEP一覧</h1>
  <!--<p class="p-step_mypage__category">カテゴリ</p>-->

  <!-- step-list -->
  <section>
    <mypage-register search="{{ $search }}"></mypage-register>
  </section>
</div>

<div class="c-search">
  <form method="GET" action="{{ route('step.mypage_register')}}">
    <div class="c-search__box">
      <input type="text" class="c-search__input" placeholder="カテゴリ名" name="search">
    </div>
    <button class="c-search__button">検索</button>
  </form>
</div>

@endsection