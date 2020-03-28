<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- title -->
    <title>@if(empty($title))STEP @else STEP | {{ $title }} @endif</title>
    <!-- description -->
    @php
      $defaultDescription = 'プログラミングや英語などを学ぶとき人それぞれの「この順番でこういったものを学んでいったのがよかった」という「STEP」を投稿し、そのことを学びたい人はその「STEP」を元に学習を進めていけるサービスです。'
    @endphp

    <meta name="description" content="@if(empty($description)){{ $defaultDescription }} @else{{ $description }} @endif">
    <!-- keywords -->
    <meta name="keywords" content="学び方がわからない,順番に学びたい,プログラミング,イラスト,ブログ,漫画,英語">

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.26.0/babel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/6.26.0/polyfill.min.js"></script>
    <script type="module" src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>