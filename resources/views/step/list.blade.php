@extends('layouts.app')

@section('content')
<div class="p-step_list">
  <div>
    <!-- main -->
    <h1 class="p-step_list__title">STEP一覧</h1>
    <!--<p class="p-step_list__category">カテゴリ</p>-->

    <!-- step-list -->
    <section>
    <step-list search="{{ $search }}"></step-list>
    </section>
  </div>
</div>
<div class="c-search">
  <form method="GET" action="{{ route('step.index')}}">
    <div class="c-search__box">
      <input type="text" class="c-search__input" placeholder="カテゴリ名" name="search">
    </div>
    <button class="c-search__button">検索</button>
  </form>
</div>

@endsection