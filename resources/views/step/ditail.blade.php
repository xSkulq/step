@extends('layouts.app_own_column')

@section('content')
<div class="p-step_ditail">

  <!-- step-list -->
  <section class="p-step_ditail__item">
    <div>
      <h1 class="p-step_ditail__title u-mb25">{{$step->title}}</h1>
      <div class="p-step_ditail__top">
        <p class="p-step_ditail__font">目安達成時間<span>{{$step->achievement_time}}</span></p>
        <p class="p-step_ditail__font u-ml15">{{$step->category}}</p>
      </div>
      <div class="p-step_ditail__border"></div>
    </div>
    <div class="u-flex__space u-mb55">
    </div>
    <div class="p-step_ditail__content">
      <p class="p-step_ditail__font">{{$step->content}}</p>
    </div>

    <!-- Twitterのシェアボタン -->
    <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>

    <!-- 登録したユーザーが自分のstepの詳細を開いた時 -->
    @if(Auth::id() === $step->user_id)
    <div class="u-mt40">
      <div>
        <div class="u-flex__center u-mb30">
          <a href="{{ route('step.edit',$step->id)}}" class="c-button p-step_ditail__button-a">編集</a>
        </div>
        <div class="u-flex__center u-mb30">
        <a href="{{ route('step.child_new',$step->id)}}" class="c-button p-step_ditail__button-a">子STEPを追加</a>
        </div>
        <form method="POST" action="{{ route('step.destory',$step->id)}}">
          @csrf
          <div class="u-flex__center">
            <button type="submit" class="c-button p-step_ditail__button" onclick='return confirm("削除しますか？");'>このSTEPを削除する</button>
          </div>
        </form>
      </div>
    </div>

    <!-- 他の人がstepの詳細を開いた時 -->
    @else
    <div class="u-mt40">
      <div>
        @if(empty($challenge->challenge_flg))
        <form method="POST" action="{{ route('step.challenge',$step->id)}}">
          @csrf
          <div class="u-flex__center u-mb30">
            <button type="submit" class="c-button p-step_ditail__button">チャレンジする</button>
          </div>
        </form>
        @elseif($challenge->challenge_flg === 0)
        <form method="POST" action="{{ route('step.challenge',$step->id)}}">
          @csrf
          <div class="u-flex__center u-mb30">
            <button type="submit" class="c-button p-step_ditail__button">チャレンジする</button>
          </div>
        </form>
        @else
        <form method="POST" action="{{ route('step.challenge_stop',$step->id)}}">
          @csrf
          <div class="u-flex__center u-mb30">
            <button type="submit" class="c-button p-step_ditail__button">チャレンジをやめる</button>
          </div>
        </form>
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
            <p class="p-list_box__font">{{$step->title}}</p>
          </div>
        </a>
      </div>
      @foreach ($step->step_children as $key => $step_child)

      <div class="p-list_box__item">
      <a href="/step/child/ditail/{{$step_child->id}}" class="p-list_box__link">
          <div>
            <p class="p-list_box__step">STEP{{ $key + 1 }}</p>
            <p class="p-list_box__font">{{$step_child->title}}</p>
          </div>
        </a>
      </div>
      @endforeach
  </section>
</div>

@endsection