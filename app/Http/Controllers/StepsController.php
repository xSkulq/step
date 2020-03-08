<?php

namespace App\Http\Controllers;
use App\Step;
use App\User;
use App\Challenge;
use App\Clear;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StepsController extends Controller
{
  // step一覧
  public function index(Request $request)
  {
    //$input = $request->input('search');
    return view('step.list');
  }

  public function api_index(Request $request)
  {
    $searchQuery = $request->input('search');
    $steps = Step::with('user');
    if (!empty($searchQuery)) {
      $steps = $steps->WhereHas('steps', function ($q) use ($searchQuery) {
        $q->where('category', 'LIKE', "%{$searchQuery}%");
      });
    }
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
      'title' => 'required|string|max:191',
      'category' => 'nullable|string|max:191',
      'achievement_time' => 'nullable|string|max:25',
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

    // チャレンジしているかの値
    $challenge = Challenge::where('step_id',$stepId)->where('user_id',$userId)->first();
    return view('step.ditail',compact('step','challenge'));
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

  // チャレンジSTEP一覧を表示
  public function api_mypage_challenge(Request $request)
  {
    $userId = Auth::id();

     /*$challengeSteps = Challenge::with(['step','user','clears']);
    $challengeSteps = $challengeSteps->where('user_id', $userId)->orderBy('created_at', 'desc');
    $challengeSteps = $challengeSteps->get();*/

    $challengeSteps = Step::with(['challenges','user','step_children','clears']);
    $challengeSteps = $challengeSteps->WhereHas('challenges', function($query){// TODO:challengeの作成日順にならない
        $query->where('challenge_flg',1)->where('user_id',Auth::id());
      });
    $challengeSteps = $challengeSteps->orderBy('created_at', 'desc')->get();
    return response()->json($challengeSteps);
  }


  // step編集の更新
  public function update(Request $request, $id)
  {

    $request->validate([
      'title' => 'required|string|max:191',
      'category' => 'nullable|string|max:191',
      'achievement_time' => 'nullable|string|max:25',
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
    $step = $step->delete();
    return redirect('/step/mypage_register');
  }

  // チャレンジする
  public function challenge($id)
  {
    //stepのid
    $stepId = $id;
    $challenge = new Challenge();

    // チャレンジするstepを保存
    $challenge->user_id = Auth::id();
    $challenge->step_id = $stepId;
    $challenge->challenge_flg = true;
    $challenge->save();
    return redirect('/step/ditail/'.$stepId);
  }

    // チャレンジやめる
    public function challenge_stop($id)
  {
    //stepのid
    $stepId = $id;
    $userId = Auth::id();

    // チャレンジをやめるstepを削除
    $challenge_stop = Challenge::where('step_id',$stepId)->where('user_id',$userId)->first();
    $challenge_stop = $challenge_stop->delete();
    return redirect('/step/mypage_challenge');
  }
}
