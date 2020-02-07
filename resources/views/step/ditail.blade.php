@extends('layouts.app_own_column')

@section('content')
<div class="p-step_ditail u-flex">

  <!-- step-list -->
  <section class="p-step_ditail__item">
    <div>
      <h1 class="p-step_ditail__title u-mb25">タイトル</h1>
      <div class="u-flex p-step_ditail__top u-mb15">
        <p class="p-step_ditail__font">目安達成時間<span>1時間</span></p>
        <p class="p-step_ditail__font">カテゴリ</p>
      </div>
    </div>
    <div class="u-flex__space u-mb55">
      <div class="p-step_ditail__medium u-flex">
        <p class="p-step_ditail__font">pv<span>1000</span></p>
        <p class="p-step_ditail__font">いいね数<span>1000</span></p>
        <p class="p-step_ditail__font">チャレンジ数<span>2000</span></p>
      </div>
      <div>
        <button>Twitterにシェア</button>
      </div>
    </div>
    <div class="p-step_ditail__content">
      <p class="p-step_ditail__font">内容</p>
    </div>
    <div class="u-flex__center">
      <button type="submit" class="c-button p-step_ditail__button-font">チャレンジする</button>
    </div>
  </section>

  <!-- step-list-box -->
  <section>
    <div>
      <h1>STEP一覧</h1>
    </div>
    <div>
      <p>STEP<span>STEPタイトル</span></p>
    </div>
    <div>
      <p>STEP1<span>〇〇本を読む</span></p>
    </div>
  </section>
</div>

@endsection