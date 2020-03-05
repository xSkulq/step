@extends('layouts.app_lp')

@section('content')

  <!-- トップ画像 -->
  <div class="p-lp__top-img">
    <p class="p-lp__top-img__font">あなたの人生のSTEPを共有しよう</p>
    <img src="{{ asset('/imges/top-img1.png') }}" alt="イラスト" class="p-lp__top-img__img"><!-- top-imgの画像はまだ決定ではない -->
  </div>

  <!-- about -->
  <div class="p-lp__about">
    <h1 class="p-lp__about__title">About</h1>
    <p class="p-lp__about__font">プログラミングや英語などを学ぶのにも人それぞれ「これがよかった」という「順番」と「内容」があると思います。</p>
    <p class="p-lp__about__font">
      人それぞれの「この順番でこういったものを学んでいったのがよかった」という「STEP」を投稿し、そのことを学びたい人はその「STEP」を元に
      学習を進めていけるサービスです。
    </p>
  </div>

  <!-- border -->
  <div class="p-lp__border"></div>

  <!-- Convey -->
  <div class="p-lp__convey">
    <h1 class="p-lp__convey__title">Convey</h1>
    <div class="p-lp__convey__box">
      <div class="p-lp__convey__card">
        <h2 class="p-lp__convey__card-title">STEPを共有してくれるあなたへ</h2>
        <p class="p-lp__convey__font">
          自分が今までに学んできたことがあると思います
          そこで、この順番でこういったものを学んでいたらよかったと思ったことはありませんか？<br>
          よかったら、この順番で学んでいったらいいよというノウハウを、これからそのことを学ぼうとしている
          人たちに伝えて欲しいです。
        </p>
      </div>
      <div class="p-lp__convey__card">
        <h2 class="p-lp__convey__card-title">STEPを学びたいあなたへ</h2>
        <p class="p-lp__convey__font">
          自分が何か学びたいことがあってもどういう方法で学んでいったらいいかわからないと思います。<br>
          そこで、先に学びたいことを学んでいる人たちに
          この順番でこういう方法を使って学んでいった方が良かったという、ノウハウを見て学ぶ方法の
          助けができると思います。
        </p>
      </div>
    </div>
  </div>

  <!-- border -->
  <div class="p-lp__border"></div>

  <!-- Flow -->
  <div class="p-lp__flow">
    <h1 class="p-lp__flow__title">Flow</h1>
    <div class="p-lp__flow__box">
      <div class="p-lp__flow__card">
        <h2 class="p-lp__flow__card-title">STEP1</h2>
        <p class="p-lp__flow__font">
          学びたいSTEPを<br>
          探していく
        </p>
      </div>
      <div class="p-lp__flow__card">
        <h2 class="p-lp__flow__card-title">STEP2</h2>
        <p class="p-lp__flow__font">
          学びたいSTEPを<br>
          チャレンジする
        </p>
      </div>
      <div class="p-lp__flow__card">
        <h2 class="p-lp__flow__card-title">STEP3</h2>
        <p class="p-lp__flow__font">
          順番にSTEPを<br>
          クリアしていく
        </p>
      </div>
    </div>
  </div>

  <!--　footer --><!-- 移転予定 -->
  <div class="p-lp__footer">
    <!-- footer-top -->
    <div class="p-lp__footer__top">
      <h1 class="p-lp__footer__top-title">あなたの人生のSTEPを共有しよう</h1>
      <div class="u-flex__center">
      <a href="{{ route('register')}}" class="p-lp__footer__top-button">登録してみませんか？</a>
      </div>
    </div>

    <!-- footer-bottom -->
    <div class="p-lp__footer__bottom">
      <a href="{{ url('/') }}">
      <img src="{{ asset('imges/logo1.png')}}" alt="" class="p-lp__footer__bottom-img">
      </a>
      <div>
        <p>©︎xSkula</p>
      </div>
    </div>
  </div>

@endsection