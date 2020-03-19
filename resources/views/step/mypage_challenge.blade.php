@extends('layouts.app')

@section('content')
<div class="p-step_mypage">

  <!-- main -->
  <h1 class="p-step_challenge__title">マイページ</h1>

  <div class="p-step_challenge__choice">
    <div>
      <a href="{{ route('step.mypage_challenge')}}" class="p-step_challenge__choice__font">チャレンジしているSTEP一覧</a>
    </div>
    <div class="u-ml15 u-mr15">|</div>
    <div>
      <a href="{{ route('step.mypage_register')}}" class="p-step_challenge__choice__font">登録済みSTEP一覧</a>
    </div>
  </div>

  <!-- クリア数 -->
  <div class="p-step_challenge__clear">
    <div class="p-step_challenge__prof">
      <img src="/imges/no_image.png" alt="アイコン" class="p-step_challenge__prof__img">
      <p class="u-ml15">紗倉あんこ</p>
    </div>
    <div class="p-step_challenge__clear__number">
      <p>全部のクリア数</p>
      <p class="p-step_challenge__clear__number__big">11</p>
    </div>
  </div>


  <form method="GET" action="{{ route('step.index')}}">
    <!-- 検索系 -->
    <div class="u-flex u-mb50">
      <div class="u-flex">
        <div class="c-search__box">
          <input type="text" class="c-search__input" placeholder="カテゴリ名" name="search">
        </div>
        <button class="p-step_challenge__button">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <div class="p-step_challenge__select">
        <select name="pref_id" class="c-select p-step_challenge__select__box">
          <option selected="selected" value="">選択してください</option>
          <option value="1">プログラミング</option>
          <option value="1">イラスト</option>
          <option value="47">英語</option>
        </select>
      </div>
    </div>
  </form>

  <!-- step-list -->

  <div class="p-step_challenge__box">
    <h2 class="p-step_challenge__sub-title">チャレンジしているSTEP達</h2>
    <div class="p-step_challenge__card">
      <div class="p-step_challenge__thead">
        <img src="/imges/no_image.png" alt="アイコン" class="p-step_challenge__thead__img">
        <a href="" class="p-step_challenge__thead__button">続きから</a>
      </div>
      <div class="p-step_challenge__tbody">
        <div class="p-step_challenge__top">
          <p class="u-mb5">STEP</p>
          <p class="p-step_challenge__top__font">英語を最速で学ぶ方法ああああああああああああああああああ</p>
        </div>
        <div class="p-step_challenge__medium">
          <p class="p-step_challenge__medium__font">1/2<span class="u-ml5">STEP</span></p>
          <!-- プログレスバー -->
          <div class="c-progress">
            <div class="c-progress__bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
              <span>100%</span>
            </div>
          </div>
        </div>
        <div class="p-step_challenge__bottom">
          <div class="p-step_challenge__bottom__prof">
            <img src="/imges/no_image.png" alt="アイコン" class="p-step_mypage__icon">
            <p class="u-ml5">紗倉あんこ</p>
          </div>
          <div class="u-flex">
            <div class="u-flex">
              <i class="fas fa-inbox"></i>
              <p class="u-ml5">プログラミング</p>
            </div>
            <div class="u-flex u-ml10">
              <i class="fas fa-hourglass-end"></i>
              <p class="u-ml5">1時間</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="p-step_challenge__card">
      <div class="p-step_challenge__thead">
        <img src="/imges/no_image.png" alt="アイコン" class="p-step_challenge__thead__img">
        <a href="" class="p-step_challenge__thead__button">続きから</a>
      </div>
      <div class="p-step_challenge__tbody">
        <div class="p-step_challenge__top">
          <p class="u-mb5">STEP</p>
          <p class="p-step_challenge__top__font">英語を最速で学ぶ方法</p>
        </div>
        <div class="p-step_challenge__medium">
          <p class="p-step_challenge__medium__font">1/2<span class="u-ml5">STEP</span></p>
          <!-- プログレスバー -->
          <div class="c-progress">
            <div class="c-progress__bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
              <span>100%</span>
            </div>
          </div>
        </div>
        <div class="p-step_challenge__bottom">
          <div class="p-step_challenge__bottom__prof">
            <img src="/imges/no_image.png" alt="アイコン" class="p-step_mypage__icon">
            <p class="u-ml5">紗倉あんこ</p>
          </div>
          <div class="u-flex">
            <div class="u-flex">
              <i class="fas fa-inbox"></i>
              <p class="u-ml5">プログラミング</p>
            </div>
            <div class="u-flex u-ml10">
              <i class="fas fa-hourglass-end"></i>
              <p class="u-ml5">1時間</p>
            </div>
          </div>
        </div>
      </div>
    </div>




  </div>
  <section>
    <!--<mypage-challenge></mypage-challenge>-->
  </section>
</div>


@endsection