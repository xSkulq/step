@extends('layouts.app')

@section('content')
<div class="p-step_mypage">

  <!-- main -->
  <h1 class="p-step_mypage__title">マイページ</h1>

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
      <div class="p-step_mypage__list-box">
        <a href="" class="p-step_mypage__card">
          <div>
            <div class="p-step_mypage__thead">
              <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_mypage__img">
            </div>
            <div class="p-step_mypage__tbody">
              <div class="p-step_mypage__top">
                <p>2020/03/23</p>
                <div class="u-flex">
                  <div class="u-flex">
                    <i class="fas fa-inbox"></i>
                    <p class="u-ml5">英語</p>
                  </div>
                  <div class="u-flex u-ml10">
                    <i class="fas fa-hourglass-end"></i>
                    <p class="u-ml5">1日</p>
                  </div>
                </div>
              </div>
              <div class="p-step_mypage__medium">
                <p class="u-mb5">STEP</p>
                <p class="p-step_mypage__medium__font">英語を最速で学ぶ方法</p>
              </div>
              <div class="p-step_mypage__bottom">
                <img src="/imges/no_image.png" alt="アイコン" class="p-step_mypage__icon">
                <p class="u-ml10">紗倉あんこ</p>
              </div>
            </div>
          </div>
        </a>

        <a href="" class="p-step_mypage__card">
          <div>
            <div class="p-step_mypage__thead">
              <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_mypage__img">
            </div>
            <div class="p-step_mypage__tbody">
              <div class="p-step_mypage__top">
                <p>2020/03/23</p>
                <div class="u-flex">
                  <div class="u-flex">
                    <i class="fas fa-inbox"></i>
                    <p class="u-ml5">英語</p>
                  </div>
                  <div class="u-flex u-ml10">
                    <i class="fas fa-hourglass-end"></i>
                    <p class="u-ml5">1日</p>
                  </div>
                </div>
              </div>
              <div class="p-step_mypage__medium">
                <p class="u-mb5">STEP</p>
                <p class="p-step_mypage__medium__font">英語を最速で学ぶ方法</p>
              </div>
              <div class="p-step_mypage__bottom">
                <img src="/imges/no_image.png" alt="アイコン" class="p-step_mypage__icon">
                <p class="u-ml10">紗倉あんこ</p>
              </div>
            </div>
          </div>
        </a>

        <a href="" class="p-step_mypage__card">
          <div>
            <div class="p-step_mypage__thead">
              <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_mypage__img">
            </div>
            <div class="p-step_mypage__tbody">
              <div class="p-step_mypage__top">
                <p>2020/03/23</p>
                <div class="u-flex">
                  <div class="u-flex">
                    <i class="fas fa-inbox"></i>
                    <p class="u-ml5">英語</p>
                  </div>
                  <div class="u-flex u-ml10">
                    <i class="fas fa-hourglass-end"></i>
                    <p class="u-ml5">1日</p>
                  </div>
                </div>
              </div>
              <div class="p-step_mypage__medium">
                <p class="u-mb5">STEP</p>
                <p class="p-step_mypage__medium__font">英語を最速で学ぶ方法</p>
              </div>
              <div class="p-step_mypage__bottom">
                <img src="/imges/no_image.png" alt="アイコン" class="p-step_mypage__icon">
                <p class="u-ml10">紗倉あんこ</p>
              </div>
            </div>
          </div>
        </a>

        <a href="" class="p-step_mypage__card">
          <div>
            <div class="p-step_mypage__thead">
              <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_mypage__img">
            </div>
            <div class="p-step_mypage__tbody">
              <div class="p-step_mypage__top">
                <p>2020/03/23</p>
                <div class="u-flex">
                  <div class="u-flex">
                    <i class="fas fa-inbox"></i>
                    <p class="u-ml5">英語</p>
                  </div>
                  <div class="u-flex u-ml10">
                    <i class="fas fa-hourglass-end"></i>
                    <p class="u-ml5">1日</p>
                  </div>
                </div>
              </div>
              <div class="p-step_mypage__medium">
                <p class="u-mb5">STEP</p>
                <p class="p-step_mypage__medium__font">英語を最速で学ぶ方法</p>
              </div>
              <div class="p-step_mypage__bottom">
                <img src="/imges/no_image.png" alt="アイコン" class="p-step_mypage__icon">
                <p class="u-ml10">紗倉あんこ</p>
              </div>
            </div>
          </div>
        </a>
  
        
      </div>



  <!-- step-list -->
  <section>
    <!--<mypage-register></mypage-register>-->
  </section>
</div>

@endsection