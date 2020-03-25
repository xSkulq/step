@extends('layouts.app')

@section('content')
<div class="p-step_ditail">

  <!-- step-list -->
  <section class="p-step_ditail__item">
    <!-- STEPの詳細 -->
    <div class="p-step_ditail__thead">
      <h1 class="p-step_ditail__title">
        STEPタイトル
        <span class="p-step_ditail__title__user">{{$step->title}}</span>
      </h1>
      @if(Auth::id() === $step->user_id)
      <div></div>
      @else
      <div class="p-step_ditail__challenge">
        <div>
          @if( count($step->step_children) === count($step->clears))
          <p class="u-mb5">全てのSTEPをクリアしました<p>
          @elseif($challenge)
          <p class="u-mb5">チャレンジしている<p>
          <p class="p-step_ditail__percent">進捗率<span class="u-ml5">{{ floor(count($step->clears) / count($step->step_children)*100) }}%</span></p>
          @endif
        </div>
      </div>
      @endif
      <div class="p-step_ditail__top">
        <div class="u-flex">
          <p>作成日<span class="u-ml5">{{date('Y/m/d', strtotime($step->created_at))}}<span></p>
          <div class="u-flex u-ml15">
            <i class="fas fa-inbox"></i>
            <p class="u-ml5">{{ $step->category->name }}</p>
          </div>
          <div class="u-flex u-ml10">
            <i class="fas fa-hourglass-end"></i>
            <p class="u-ml5">{{ $step->total_time }}</p>
          </div>
        </div>
        <div>
        </div>
      </div>
    </div>
    <div class="p-step_ditail__tbody">
      <div class="p-step_ditail__medium">
        @if($step->pic)
        <img src="data:image/png;base64,{{ $step->pic }}" alt="STEP画像TOP" class="p-step_ditail__img">
        @else
        <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_ditail__img">
        @endif
      </div>
      <div class="p-step_ditail__bottom">
        <p class="">{{$step->content}}</p>
      </div>
    </div>

    <!-- Twitterのシェアボタン -->
    <div>
      <!-- 後で修正する -->
    <!--<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>-->
    <!--<a href="https://twitter.com/share?url={{ request()->fullUrl() }}" class="twitter-share-button">Tweet</a>-->
    <!--<a data-size="large" data-text="STEP"　href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>-->
    <a data-size="large" data-text="STEP"　href="https://twitter.com/share?{{ request()->fullUrl() }}" class="twitter-share-button" data-show-count="false">Tweet</a>
    <!--<a data-size="large" data-text="STEP"　href="https://twitter.com/share?" class="twitter-share-button" data-show-count="false" >Tweet</a>-->
    </div>

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
            <button type="submit" class="c-button p-step_ditail__button" onclick='return confirm("STEPを削除したらこのSTEPの全ての子STEPも消えてしまいますが削除しますか？");'>このSTEPを削除する</button>
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
            <button type="submit" class="c-button p-step_ditail__button" onclick='return confirm("このSTEPのチャレンジをやめますか？");'>チャレンジをやめる</button>
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
            <p class="p-list_box__step">STEPタイトル</p>
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