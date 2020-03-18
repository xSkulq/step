@extends('layouts.app')

@section('content')
<div class="p-step_list">
  <div>
    <!-- main -->
    <h1 class="p-step_list__title">STEP一覧</h1>

    <form method="GET" action="{{ route('step.index')}}">
      <div class="u-flex">
        <div class="c-search__box">
          <input type="text" class="c-search__input" placeholder="カテゴリ名" name="search">
        </div>
        <button class="">検索</button>
      </div>
    </form>

    <!-- step-list -->
    <div>
      <div>
        <div>
          <img src="" alt="">
        </div>
        <div>
          <p>2020/03/23</p>
          <p>英語</p>
          <p>1日</p>
        </div>
        <div>
          <p>STEP<span>英語を最速で学ぶ方法</span></p>
        </div>
        <div>
          <img src="" alt="">
          <p>紗倉あんこ</p>
        </div>
      </div>
    </div>







    <!-- step-list -->
    <section>
    <!--<step-list></step-list>-->
    </section>
  </div>
</div>

@endsection