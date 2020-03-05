<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RootController extends Controller
{
  // ログイン中ならダッシュボード、ログインしてないならLPを表示
  public function root()
  {
    if (Auth::check()) {
      return view('step.list');
    } else {
      return view('lp');
    }
  }
}
