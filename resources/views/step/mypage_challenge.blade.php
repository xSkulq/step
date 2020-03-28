@php
  $title = 'マイページ | チャレンンジしているSTEP';
@endphp
@extends('layouts.app')

@section('content')
<div class="p-step_challenge">

  <!-- main -->
  <h1 class="p-step_challenge__title">マイページ</h1>

  <div class="p-step_challenge__choice">
    <div>
      <a href="{{ route('step.mypage_challenge')}}" class="p-step_challenge__choice__font @if( request()->path() === 'step/mypage_challenge') p-step_mypage__choice__current @endif">チャレンジしているSTEP一覧</a>
    </div>
    <div class="p-step_mypage__choice__pipe">|</div>
    <div>
      <a href="{{ route('step.mypage_register')}}" class="p-step_challenge__choice__font">登録済みSTEP一覧</a>
    </div>
  </div>

  <!-- クリア数 -->
  <div class="p-step_challenge__clear">
    <div class="p-step_challenge__prof">
      @if($user->pic)
      <img src="data:image/png;base64,{{ $user->pic }}" alt="アイコン" class="p-step_challenge__prof__img">
      @else
      <img src="/imges/no_image.png" alt="アイコン" class="p-step_challenge__prof__img">
      @endif
      <p class="u-ml15">{{$user->name}}</p>
    </div>
    <div class="p-step_challenge__clear__number">
      <p>全部のクリア数</p>
      <p class="p-step_challenge__clear__number__big">{{ $clearCount }}</p>
    </div>
  </div>


  <form method="GET" action="{{ route('step.mypage_challenge')}}">
    <!-- 検索系 -->
    <div class="p-step_mypage__search">
      <div class="u-flex">
        <div class="c-search__box">
          <input type="text" class="c-search__input" placeholder="STEP名・達成時間・ユーザー名" name="search"　value="@if(!empty('$search')){{ $search }}@endif">
        </div>
        <button class="p-step_challenge__button">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <div class="p-step_challenge__select">
        {{ Form::select('category_id', $categories, $category, ['class' => 'c-select', 'id' => 'category_id']) }}
      </div>
      <button class="p-step_list__button">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </form>

  <!-- step-list -->

  <div>
    <h2 class="p-step_challenge__sub-title">チャレンジしているSTEP達</h2>
    <mypage-challenge search="{{ $search }}" category="{{ $category }}"></mypage-challenge>
  </div>
</div>


@endsection