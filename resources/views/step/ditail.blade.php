@extends('layouts.app_own_column')

@section('content')
<div class="p-step_ditail">

  <!-- step-list -->
  <section class="p-step_ditail__item">
    <div>
      <h1 class="p-step_ditail__title u-mb25">タイトル</h1>
      <div class="p-step_ditail__top">
        <p class="p-step_ditail__font">目安達成時間<span>1時間</span></p>
        <p class="p-step_ditail__font u-ml15">カテゴリ</p>
      </div>
      <div class="p-step_ditail__border"></div>
    </div>
    <div class="u-flex__space u-mb55">
      <!--<div class="p-step_ditail__medium u-flex">
        <p class="p-step_ditail__font">pv<span>1000</span></p>
        <p class="p-step_ditail__font">いいね数<span>1000</span></p>
        <p class="p-step_ditail__font">チャレンジ数<span>2000</span></p>
      </div>-->
      <!--<div>
        <button>Twitterにシェア</button>
      </div>-->
    </div>
    <div class="p-step_ditail__content">
      <p class="p-step_ditail__font">内容</p>
    </div>
    <div class="u-flex__center">
      <button type="submit" class="c-button p-step_ditail__button-font">チャレンジする</button>
    </div>
  </section>

  <!-- step-list-box -->
  <section class="p-list_box">
    <div class="p-list_box__item">
      <h1 class="p-list_box__title">STEP一覧</h1>
    </div>
      <div class="p-list_box__item">
        <a href="" class="p-list_box__link">
          <div>
            <p class="p-list_box__step">STEP</p>
            <p class="p-list_box__font">STEPタイトル</p>
          </div>
        </a>
      </div>
      <div class="p-list_box__item">
        <a href="" class="p-list_box__link">
          <div>
            <p class="p-list_box__step">STEP1</p>
            <p class="p-list_box__font">〇〇本を読む</p>
          </div>
        </a>
      </div>
  </section>
</div>

@endsection