@extends('layouts.app_own_column')

@section('content')
<div class="p-step_ditail">

  <!-- step-list -->
  <section class="p-step_ditail__item">
    <div>
      <h1 class="p-step_ditail__title u-mb25">
        STEP1
        <span>{{$stepChild->title}}</span>
      </h1>
      <div class="p-step_ditail__top">
        <p>作成日<span class="u-ml5">2020/03/24<span></p>
        <div class="u-flex u-ml15">
          <i class="fas fa-inbox"></i>
          <p class="u-ml5">プログラミング</p>
        </div>
        <div class="u-flex u-ml10">
          <i class="fas fa-hourglass-end"></i>
          <p class="u-ml5">1時間</p>
        </div>
      </div>
    </div>
    <div class="p-step_ditail__tbody">
      <div class="p-step_ditail__medium">
        <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_ditail__img">
      </div>
      <div class="p-step_ditail__bottom">
        <p class="">{{$stepChild->content}}</p>
      </div>
    </div>

    <!-- Twitterのシェアボタン -->
    <div>
      <!-- 後で修正する -->
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>
    </div>

    <!-- 登録したユーザーが自分のstepの詳細を開いた時 -->
    @if(Auth::id() === $step->user_id)
    <div class="u-mt40">
      <div class="u-flex__center u-mb30">
        <a href="/step/child/edit/{{$stepChild->id}}" class="c-button p-step_ditail__button-a">編集</a>
      </div>
      <div class="u-flex__center u-mb30">
      <a href="{{ route('step.child_new',$stepChild->step->id)}}" class="c-button p-step_ditail__button-a">子STEPを追加</a>
      </div>
      <form method="POST" action="{{ route('step.child_destory',$stepChild->id)}}">
        @csrf
      <div class="u-flex__center">
        <button type="submit" class="c-button p-step_ditail__button" onclick='return confirm("削除しますか？");'>この子STEPを削除する</button>
      </div>
      </form>
    </div>

    <!-- 他の人がstepの詳細を開いた時 -->
    @else
    <div class="u-mt40">
      <div>
        @if(empty($challenge->challenge_flg))
        <div></div>
        @elseif($challenge->challenge_flg === 1 && empty($clear->clear_flg))
        <form method="POST" action="{{ route('step.child_clear',$stepChild->id)}}">
          @csrf
          <div class="u-flex__center u-mb30">
            <button type="submit" class="c-button p-step_ditail__button">クリア</button>
          </div>
        </form>
        @else
        <div></div>
        @endif
      </div>
    </div>
    @endif
  </section>

  <!-- step-list-box -->
  <section class="p-list_box">
    <div class="p-list_box__item">
      <h1 class="p-list_box__title">STEP一覧</h1>
    </div>
      <div class="p-list_box__item">
      <a href="/step/ditail/{{$step->id}}" class="p-list_box__link">
          <div>
            <p class="p-list_box__step">STEP</p>
          <p class="p-list_box__font">{{ $step->title }}</p>
          </div>
        </a>
      </div>
      @foreach ($step->step_children as $key => $step_child)
      
      <div class="p-list_box__item">
        <a href="/step/child/ditail/{{ $step_child->id }}" class="p-list_box__link">
          <div>
          <p class="p-list_box__step">STEP{{ $key+1 }}</p>
            <p class="p-list_box__font">{{ $step_child->title }}</p>
          </div>
        </a>
      </div>
          
      @endforeach
  </section>
</div>

@endsection