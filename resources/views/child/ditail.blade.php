@php
  $title = '子STEP詳細 | '.$stepChild->title;
  $description = $stepChild->content;
@endphp
@extends('layouts.app')

@section('content')
<div class="p-step_ditail">

  <!-- step-list -->
  <section class="p-step_ditail__item">
    <div>
      <h1 class="p-step_ditail__title u-mb25">
        STEP
          @foreach ($step->step_children as $key => $step_child)
          @if($step_child['id'] === $stepChild->id)
            {{ $key+1 }}
          @endif
          @endforeach
        <span class="p-step_ditail__title__user">{{$stepChild->title}}</span>
      </h1>
      <div class="p-step_ditail__challenge">
        @if($challenge)
        <div>
          @if(empty($clear->clear_flg))
          <p></p>
          @elseif( count($step->step_children) === count($step->clears))
          <p>全てのSTEPをクリアしました<p>
          @else
          <p>クリアしました<p>
          @endif
          <p class="p-step_ditail__percent">進捗率<span class="u-ml5">{{ floor(count($step->clears) / count($step->step_children)*100) }}%</span></p>
        </div>
        @endif
      </div>
      <div class="p-step_ditail__top">
        <div class="u-flex">
          <p>作成日<span class="u-ml5">{{date('Y/m/d', strtotime($stepChild->created_at))}}<span></p>
          <div class="u-flex u-ml15">
            <i class="fas fa-inbox"></i>
            <p class="u-ml5">{{ $step->category->name}}</p>
          </div>
          <div class="u-flex u-ml10">
            <i class="fas fa-hourglass-end"></i>
            <p class="u-ml5">{{ $step->total_time }}</p>
          </div>
        </div>
      </div>
    </div>
    <!-- クリアしているかもしくは、クリアボタンがあるSTEP詳細だけ内容が表示される処理 -->
    @if(Auth::id() === $step->user_id)<!-- 登録したuserの場合 -->
    <div class="p-step_ditail__tbody">
      <div class="p-step_ditail__medium">
        @if($stepChild->pic)
        <img src="data:image/png;base64,{{ $stepChild->pic }}" alt="STEP画像TOP" class="p-step_ditail__img">
        @else
        <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_ditail__img">
        @endif
      </div>
      <div class="p-step_ditail__bottom">
        <p class="">{{$stepChild->content}}</p>
      </div>
    </div>


    <!-- チャレンジボタンを押さないと出る処理 -->
    @elseif(empty($challenge->challenge_flg))
    <div>
      <p>チャレンジをしないとみられません</p>
    </div>


    <!-- 登録したuserではなくかつチャレンジボタンを押したstepかつクリアボタンを押されてないstep -->
    @elseif($challenge->challenge_flg === 1 && empty($clear->clear_flg))
      @if($clear_prev || $step->step_children[0]->id == $stepChild->id)
      <div class="p-step_ditail__tbody">
        <div class="p-step_ditail__medium">
          @if($stepChild->pic)
          <img src="data:image/png;base64,{{ $stepChild->pic }}" alt="STEP画像TOP" class="p-step_ditail__img">
          @else
          <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_ditail__img">
          @endif
        </div>
        <div class="p-step_ditail__bottom">
          <p class="">{{$stepChild->content}}</p>
        </div>
      </div>
      @else
      <div class="p-step_ditail__tbody">
        <p class="p-step_ditail__clear-none">まだ前の子STEPをクリアできてません</p>
        <a href="setp/child/ditail/"></a>
      </div>
      @endif


    @else
      <div class="p-step_ditail__tbody">
        <div class="p-step_ditail__medium">
          @if($stepChild->pic)
          <img src="data:image/png;base64,{{ $stepChild->pic }}" alt="STEP画像TOP" class="p-step_ditail__img">
          @else
          <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_ditail__img">
          @endif
        </div>
        <div class="p-step_ditail__bottom">
          <p class="">{{$stepChild->content}}</p>
        </div>
      </div>
    @endif


    <!-- Twitterのシェアボタン -->
    <div>
      <!-- 後で修正する -->
      <!--<a href="https://twitter.com/share?&url={{ request()->fullUrl() }}" class="twitter-share-button">Tweet</a>-->
    <!--<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>-->
    <a data-size="large" data-text="STEP"　href="https://twitter.com/share?{{ request()->fullUrl() }}" class="twitter-share-button" data-show-count="false">Tweet</a>
    <!--<a data-hashtags="masizime" data-via="masizime" data-related="masizime:こんにちはウェブのましじめです。" data-size="large" data-text="カスタムテキスト"　href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a>-->
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
        <button type="submit" class="c-button p-step_ditail__button" onclick='return confirm("この子STEPを削除しますか？");'>この子STEPを削除する</button>
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
          @if($clear_prev || $step->step_children[0]->id == $stepChild->id)
            <div class="u-flex__center u-mb30">
              <button type="submit" class="c-button p-step_ditail__button">クリア</button>
            </div>
          @endif
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
            <p class="p-list_box__step">STEPタイトル</p>
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