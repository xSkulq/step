<?php

namespace App\Http\Controllers;
use App\Step;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StepsController extends Controller
{
  public function index()
  {
    // userid
    $userId = Auth::id();
    $steps = Step::with(['user']);
    $steps = Step::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
    return view('step.list', compact('steps'));
  }

  // 新規STEP登録の画面を表示
  public function new()
  {
    return view('step.register');
  }
  
  // 新規STEP登録の送信された情報を保存
  public function store(Request $request)
  {

    $request->validate([
      'title' => 'required|string|max:255',
      'category' => 'nullable|string|max:255',
      'achievement_time' => 'nullable|string|max:255',
      'content' => 'required|string'
    ]);

    $step = new Step();
    Auth::user()->steps()->save($step->fill($request->all()));
    return redirect('/home');
  }

  public function edit()
  {
    return view('step.edit');
  }

  public function show()
  {
    return view('step.ditail');
  }

  public function mypage_register(Request $request)
  {
    // userid
    $userId = Auth::id();
    $steps = Step::with(['user']);
    $steps = Step::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
    //dd($steps);
    return view('step.mypage_register', compact('steps'));
  }

  public function mypage_challenge()
  {
    return view('step.mypage_challenge');
  }
}
