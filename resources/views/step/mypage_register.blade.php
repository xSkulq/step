@extends('layouts.app')

@section('content')
<div class="p-step_mypage">

  <!-- main -->
  <h1 class="p-step_mypage__title">登録済みSTEP一覧</h1>
  <p class="p-step_mypage__category">カテゴリ</p>

  <!-- step-list -->
  <section>
    <div class="p-step_mypage__item">
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
      <div class="p-step_mypage__medium">
        <p class="p-step_mypage__medium-font">STEP<span>最短で学んだ私の英語学習方法</span></p> <!-- TODO: クラス名いいの思いついたら変える -->
      </div>
      <div class="p-step_mypage__bottom">
        <div>
          <p class="p-step_mypage__bottom-font">カテゴリ</p>
        </div>
        <div class="u-flex">
          <p class="p-step_mypage__bottom-font">pv<span>1000</span></p>
          <p class="p-step_mypage__bottom-font">
            <!-- iタグをいれる(チャレンジ数にちなんだ) -->
            <span>1000</span>
          </p>
          <p class="p-step_mypage__bottom-font">
            <!-- iタグをいれる(ハートのアイコン) -->
            <span>1000</span>
          </p>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection