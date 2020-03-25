@extends('layouts.app')

@section('content')
<div class="p-step_mypage">

  <!-- main -->
  <h1 class="p-step_mypage__title">マイページ</h1>

  <div class="p-step_mypage__choice">
    <div>
      <a href="{{ route('step.mypage_challenge')}}" class="p-step_mypage__choice__font">チャレンジしているSTEP一覧</a>
    </div>
    <div class="p-step_mypage__choice__pipe">|</div>
    <div>
      <a href="{{ route('step.mypage_register')}}" class="p-step_mypage__choice__font">登録済みSTEP一覧</a>
    </div>
  </div>


  <form method="GET" action="{{ route('step.mypage_register')}}">
    <!-- 検索系 -->
    <div class="p-step_mypage__search">
      <div class="u-flex">
        <div class="c-search__box">
          <input type="text" class="c-search__input" placeholder="STEP名・達成時間" name="search" value="@if(!empty('$search')){{ $search }}@endif">
        </div>
        <button class="p-step_mypage__button">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <div class="p-step_mypage__select">
        {{ Form::select('category_id', $categories, $category, ['class' => 'c-select', 'id' => 'category_id']) }}
      </div>
    </div>
  </form>

  <!-- step-list -->
  <section>
    <mypage-register search="{{ $search }}" category="{{ $category }}"></mypage-register>
  </section>
</div>

@endsection