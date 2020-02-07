@extends('layouts.app')

@section('content')
<div class="p-step_mypage">

  <!-- main -->
  <h1 class="p-step_mypage__title">STEP一覧</h1>
  <p class="p-step_mypage__category">カテゴリ</p>

  <!-- step-list -->
  <section>
    <div class="p-step_mypage__item">
      {{-- リストの上の部分 --}}
      <div class="p-step_mypage__top">
        <div class="u-flex">
          <img src="" alt="アイコン" class="p-step_mypage__img">
          <p class="p-step_mypage__name">紗倉あんこ</p>
        </div>
        <div>
          <p class="p-step_mypage__day">2019/01/10</p>
          <p class="p-step_mypage__criterion">目安達成時間<span>1時間</span></p>
        </div>
      </div>
      {{-- 真ん中の部分 --}}
      <div class="p-step_mypage__medium">
        <p class="p-step_mypage__medium-font">STEP<span>最短で学んだ私の英語学習方法</span></p>
      </div>
      {{-- 下の部分 --}}
      <div class="">
        <div class="u-flex__space">
          <p>進捗<span>10%</span></p>
          <p>1/2<span>STEP</span></p>
        </div>
        <!-- プログレスバー -->
        <div class="c-progress">
          <div class="c-progress__bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
            <span>100%</span>
          </div>
        </div>
      </div>
  </section>
</div>

@endsection