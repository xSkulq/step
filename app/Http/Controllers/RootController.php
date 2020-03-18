<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class RootController extends Controller
{
  // ログイン中ならダッシュボード、ログインしてないならLPを表示
  public function root()
  {
    if (Auth::check()) {
      return redirect('/home');
    } else {
      return view('lp');
    }
  }
}
