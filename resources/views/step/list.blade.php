@php
$title = 'STEP一覧';
    
@endphp

@extends('layouts.app')

@section('content')
<div class="p-step_list">
  <div>
    <!-- main -->
    <h1 class="p-step_list__title">STEP一覧</h1>

    <form method="GET" action="{{ route('step.index')}}">
      <div class="p-step_list__search">
        <div class="u-flex">
          <div class="c-search__box">
          <input type="text" class="c-search__input" placeholder="STEP名・達成時間・ユーザー名" name="search" value="@if(!empty('$search')){{ $search }}@endif">
          </div>
          <button class="p-step_list__button">
            <i class="fas fa-search"></i>
          </button>
        </div>
        <div class="p-step_list__select">
          {{ Form::select('category_id', $categories, $category, ['class' => 'c-select', 'id' => 'category_id']) }}
        </div>
        <button class="p-step_list__button">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </form>

    <!-- step-list -->
    <section>
      <!--<div>--><!-- メモ： ページネーションの数を10から12に上げないと3列になったときにレイアウトが崩れる -->
      <step-list search="{{ $search }}" category="{{ $category }}"></step-list>
      <!--</div>-->
    </section>
  </div>
</div>

@endsection