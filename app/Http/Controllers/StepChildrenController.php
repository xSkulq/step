<?php

namespace App\Http\Controllers;

use App\Step;
use App\StepChild;
use App\Challenge;
use App\Clear;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StepChildrenController extends Controller
{

  // 子STEP詳細画面を表示
  public function show($id)
  {
    // step_childのid
    $stepChildId = $id;
    $userId = Auth::id();
    // 詳細用のstep_childのデータ
    $stepChild = StepChild::with(['step']);
    $stepChild = $stepChild->where('id', $stepChildId)->first();

    // stepのid
    $stepId = $stepChild->step->id;
    // step一覧のデータ
    $step = Step::with(['step_children']);
    $step = $step->find($stepId);
    //$step = $step->where('id',$stepId)->first();

    // チャレンジしているかの値
    $challenge = Challenge::where('step_id',$stepId)->where('user_id',$userId)->first();

    // クリアしているかの値
    $clear = Clear::where('step_id',$stepId)->where('user_id',$userId)->where('step_child_id',$stepChildId)->first();
    //$list= array_column($step->children, 'id');
    //dd($list);
    return view('child.ditail', compact('stepChild','step','challenge','clear'));
  }


  // 子STEP登録画面を表示
  public function new($id)
  {
    $stepId = $id;
    $step = Step::find($id);
    if(Auth::id() === $step->user_id){
    return view('child.register', compact('stepId'));
    }else{
      return redirect('/home');
    }
  }

  // 子STEP編集画面を表示
  public function edit($id)
  {
    $stepChildId = $id;
    $stepChild = StepChild::with('step')->where('id',$stepChildId)->first();
    if(Auth::id() === $stepChild->step->user_id){
    return view('child.edit', compact('stepChild'));
    }else{
      return redirect('/home');
    }
  }

    // 新規子STEP登録の送信された情報を保存
    public function store(Request $request,$id)
  {
    $request->validate([
      'title' => 'required|string|max:191',
      'content' => 'required|string',
      'pic' => 'nullable|image',
    ]);

    // stepのid
    $stepId = $id;

    $step_child = new StepChild();
    $step_child->user_id = Auth::id();
    $step_child->step_id = $stepId;
    $step_child->title = $request->title;
    $step_child->content = $request->content;
    // アイコンにファイルが追加され保存したときの処理
    if ($request->pic) {

      // 送信されたファイルをstoreに保存する処理
      $file_name = time() . '.' . $request->pic->getClientOriginalName();
      $request->pic->storeAs('public', $file_name);

      // userにpicの値を格納
      $step_child->pic = $file_name;
    }
    $step_child->save();
    return redirect('/step/child/ditail/'.$step_child->id)->with('flash_message', '保存が完了しました');
  }

  // 子STEP編集画面の情報を更新する
  public function update(Request $request, $id)
  {
    // step_childのid
    $stepChildId = $id;
    $stepChild = StepChild::find($stepChildId);
    // アイコンの隣の×ボタンを押したときの処理
    if ($request->input('img_destory')){
      // 画像を消去する処理
      $deletePic = $stepChild->pic;
      Storage::delete('public/'.$deletePic);
      $stepChild->pic = '';
      $stepChild->save();
      return redirect('/step/child/edit/'.$stepChildId);
    }

    $request->validate([
      'title' => 'required|string|max:191',
      'content' => 'required|string',
      'pic' => 'nullable|image'
    ]);

    $stepChild->title = $request->title;
    $stepChild->content = $request->content;
    // アイコンにファイルが追加され保存したときの処理
    if ($request->pic) {
      // 前の画像を消去する処理
      $deletePic = $stepChild->pic;
      Storage::delete('public/'.$deletePic);

      // 送信されたファイルをstoreに保存する処理
      $file_name = time() . '.' . $request->pic->getClientOriginalName();
      $request->pic->storeAs('public', $file_name);

      // userにpicの値を格納
      $stepChild->pic = $file_name;
    }
    $stepChild->save();
    //$stepChild->fill($request->all())->save();
    return redirect('/step/child/ditail/'.$stepChildId)->with('flash_message', '保存が完了しました');
  }

  // 子STEPを削除する
  public function destory(Request $request, $id)
  {
    // step_childのid
    $stepChildId = $id;
    // stepのid
    $stepId = StepChild::with('step')->where('id',$stepChildId)->first();
    $stepId = $stepId->step->id;
    $stepChild = StepChild::find($stepChildId);
    // stepChildの削除
    $stepChild = $stepChild->delete();
    return redirect('/step/ditail/'.$stepId)->with('flash_message', '削除が完了しました');
  }

  // クリア処理
  public function clear($id)
  {
    //stepchildのid
    $stepChildId = $id;
    // stepのid
    $stepId = StepChild::with('step')->where('id',$stepChildId)->first();
    $stepId = $stepId->step->id;
    // challengeのid
    $challengeId = Challenge::where('step_id',$stepId)->first();
    $challengeId = $challengeId->id;
    $clear = new Clear();

    // チャレンジするstepを保存
    $clear->user_id = Auth::id();
    $clear->step_id = $stepId;
    $clear->step_child_id = $stepChildId;
    $clear->challenge_id = $challengeId;
    $clear->clear_flg = true;
    $clear->save();
    return redirect('/step/child/ditail/'.$stepChildId);
  }
}
