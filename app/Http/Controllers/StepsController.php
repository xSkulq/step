<?php

namespace App\Http\Controllers;
use App\Step;
use App\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StepsController extends Controller
{
  // step一覧
  public function index()
  {
    return view('step.list');
  }

  public function api_index(Request $request)
  {
    $steps = Step::with('user');
    $steps = $steps->orderBy('created_at', 'desc')->get();
    return response()->json($steps);
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


  // step編集画面を表示
  public function edit(Request $request, $id)
  {
    $userId = Auth::id();
    $step = Step::where('user_id', $userId)->find($id);
    return view('step.edit',compact('step'));
  }


  // step詳細画面を表示
  public function show($id)
  {
    // stepのid
    $stepId = $id;
    // userのid
    $userId = Auth::id();
    $step = Step::with(['user','step_children']);
    $step = $step->where('id', $stepId)->first();
    return view('step.ditail',compact('step'));
  }

  
  //登録済み一覧を表示
  public function mypage_register(Request $request)
  {
    return view('step.mypage_register');
  }

  // 登録済み一覧を表示
  public function api_mypage_register(Request $request)
  {
    // userid
    $userId = Auth::id();
    $steps = Step::with('user');
    $steps = $steps->where('user_id', $userId)->orderBy('created_at', 'desc')->get();
    return response()->json($steps);
  }


  // チャレンジ一覧表示
  public function mypage_challenge()
  {
    return view('step.mypage_challenge');
  }


  // step編集の更新
  public function update(Request $request, $id)
  {

    $request->validate([
      'title' => 'required|string|max:255',
      'category' => 'nullable|string|max:255',
      'achievement_time' => 'nullable|string|max:255',
      'content' => 'required|string'
    ]);

    $step = Step::find($id);
    $step->fill($request->all())->save();
    return redirect('/step/ditail/'.$id);
  }

  // step削除
  public function destory(Request $request, $id)
  {
    // stepのid
    $stepId = $id;
    $step = Step::find($stepId);
    // stepの削除
    $step = $step->delete(); // TODO: 削除する前に確認を取るように処理を追加しとくこと
    return redirect('/step/mypage_register');
  }

  // チャレンジする
  public function challenge($id)
  {
    $stepId = $id;
    $step = Step::find($stepId);
    $step->challenge_flg = true;
    $step->save();
    //dd($step);
    return redirect('/home');
  }

    // チャレンジやめる
    public function challenge_stop($id)
  {
    $stepId = $id;
    $step = Step::find($stepId);
    $step->challenge_flg = false;
    $step->save();
    return redirect('/step/mypage_register');
  }
}
