@extends('layouts.app')

@section('content')
<div class="p-step_list">
  <div>
    <!-- main -->
    <h1 class="p-step_list__title">STEP一覧</h1>

    <form method="GET" action="{{ route('step.index')}}">
      <div class="u-flex u-mb80">
        <div class="u-flex">
          <div class="c-search__box">
            <input type="text" class="c-search__input" placeholder="カテゴリ名" name="search">
          </div>
          <button class="p-step_list__button">
            <i class="fas fa-search"></i>
          </button>
        </div>
        <div class="p-step_list__select">
          <select name="pref_id" class="c-select p-step_list__select__box">
            <option selected="selected" value="">選択してください</option>
            <option value="1">プログラミング</option>
            <option value="1">イラスト</option>
            <option value="47">英語</option>
          </select>
        </div>
      </div>
    </form>

    <!-- step-list -->
    <div class="p-step_list__list-box">
      <a href="" class="p-step_list__card">
        <div>
          <div class="p-step_list__thead">
            <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_list__img">
          </div>
          <div class="p-step_list__tbody">
            <div class="p-step_list__top">
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
            <div class="p-step_list__medium">
              <p class="u-mb5">STEP</p>
              <p class="p-step_list__medium__font">英語を最速で学ぶ方法</p>
            </div>
            <div class="p-step_list__bottom">
              <img src="/imges/no_image.png" alt="アイコン" class="p-step_list__icon">
              <p class="u-ml10">紗倉あんこ</p>
            </div>
          </div>
        </div>
      </a>

      <a href="" class="p-step_list__card">
        <div>
          <div class="p-step_list__thead">
            <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_list__img">
          </div>
          <div class="p-step_list__tbody">
            <div class="p-step_list__top">
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
            <div class="p-step_list__medium">
              <p class="u-mb5">STEP</p>
              <p class="p-step_list__medium__font">英語を最速で学ぶ方法あああああああああああああああああああああああああああああ</p>
            </div>
            <div class="p-step_list__bottom">
              <img src="/imges/no_image.png" alt="アイコン" class="p-step_list__icon">
              <p class="u-ml10">紗倉あんこ</p>
            </div>
          </div>
        </div>
      </a>

      <a href="" class="p-step_list__card">
        <div>
          <div class="p-step_list__thead">
            <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_list__img">
          </div>
          <div class="p-step_list__tbody">
            <div class="p-step_list__top">
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
            <div class="p-step_list__medium">
              <p class="u-mb5">STEP</p>
              <p class="p-step_list__medium__font">英語を最速で学ぶ方法あああああああああああああああああああああああああああああ</p>
            </div>
            <div class="p-step_list__bottom">
              <img src="/imges/no_image.png" alt="アイコン" class="p-step_list__icon">
              <p class="u-ml10">紗倉あんこ</p>
            </div>
          </div>
        </div>
      </a>

      <a href="" class="p-step_list__card">
        <div>
          <div class="p-step_list__thead">
            <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_list__img">
          </div>
          <div class="p-step_list__tbody">
            <div class="p-step_list__top">
              <p>2020/03/23</p>
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
            <div class="p-step_list__medium">
              <p class="u-mb5">STEP</p>
              <p class="p-step_list__medium__font">プログラミングを学ぶときの注意</p>
            </div>
            <div class="p-step_list__bottom">
              <img src="/imges/no_image.png" alt="アイコン" class="p-step_list__icon">
              <p class="u-ml10">紗倉あんこ</p>
            </div>
          </div>
        </div>
      </a>


    </div>







    <!-- step-list -->
    <section>
    <!--<step-list></step-list>-->
    </section>
  </div>
</div>

@endsection