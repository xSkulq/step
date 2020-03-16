@extends('layouts.app')

@section('content')
<div class="p-step_mypage">

  <!-- main -->
  <h1 class="p-step_mypage__title u-mb80">チャレンジSTEP</h1>

  <!-- step-list -->
  <section>
    <mypage-challenge search="{{ $search }}"></mypage-challenge>
  </section>
</div>

<div class="c-search">
  <form method="GET" action="{{ route('step.mypage_challenge')}}">
    <div class="c-search__box">
      <input type="text" class="c-search__input" placeholder="カテゴリ名" name="search">
    </div>
    <button class="c-search__button">検索</button>
  </form>
</div>

@endsection