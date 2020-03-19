@extends('layouts.app')

@section('content')
<div class="p-step_mypage">

  <!-- main -->
  <h1 class="p-step_mypage__title u-mb80">マイページ</h1>

  <div class="p-step_mypage__choice">
    <div>
      <a href="" class="p-step_mypage__choice__font">チャレンジしているSTEP一覧</a>
    </div>
    <div class="u-ml15 u-mr15">|</div>
    <div>
      <a href="" class="p-step_mypage__choice__font">登録済みSTEP一覧</a>
    </div>
  </div>


  <form method="GET" action="{{ route('step.index')}}">
    <!-- 検索系 -->
    <div class="u-flex u-mb50">
      <div class="u-flex">
        <div class="c-search__box">
          <input type="text" class="c-search__input" placeholder="カテゴリ名" name="search">
        </div>
        <button class="p-step_mypage__button">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <div class="p-step_mypage__select">
        <select name="pref_id" class="c-select p-step_mypage__select__box">
          <option selected="selected" value="">選択してください</option>
          <option value="1">プログラミング</option>
          <option value="1">イラスト</option>
          <option value="47">英語</option>
        </select>
      </div>
    </div>
  </form>

  <!-- step-list -->
  <section>
    <!--<mypage-challenge></mypage-challenge>-->
  </section>
</div>


@endsection