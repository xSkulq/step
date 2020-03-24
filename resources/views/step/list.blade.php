@extends('layouts.app')

@section('content')
<div class="p-step_mypage">
  <div>
    <!-- main -->
    <h1 class="p-step_mypage__title">STEP一覧</h1>

    <form method="GET" action="{{ route('step.index')}}">
      <div class="u-flex u-mb80">
        <div class="u-flex">
          <div class="c-search__box">
          <input type="text" class="c-search__input" placeholder="STEP名・達成時間・ユーザー名" name="search" value="@if(!empty('$search')){{ $search }}@endif">
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
      <!--<div>-->
      <step-list search="{{ $search }}" category="{{ $category }}"></step-list>
      <!--</div>-->
    </section>
  </div>
</div>

@endsection