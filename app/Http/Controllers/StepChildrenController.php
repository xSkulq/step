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
    $step_child_prev = '';
    // 詳細用のstep_childのデータ
    $stepChild = StepChild::with(['step']);
    $stepChild = $stepChild->where('id', $stepChildId)->first();

    // stepのid
    $stepId = $stepChild->step->id;
    // step一覧のデータ
    $step = Step::with(['step_children']);
    $step = $step->find($stepId);

    foreach($step->step_children as $key => $step_child){
      if(($step_child['id'] == $stepChildId)){
        $step_child_key = $key;
        //dd($step_child_key);
      }
    }
    // 前の子STEPのID
    if( ($step_child_key-1) > -1){
      $step_child_prev = $step->step_children[$step_child_key-1]->id;
      //dd($step_child_prev);
    }

    // チャレンジしているかの値
    $challenge = Challenge::where('step_id',$stepId)->where('user_id',$userId)->first();

    // クリアしているかの値
    $clear = Clear::where('step_id',$stepId)->where('user_id',$userId)->where('step_child_id',$stepChildId)->first();
    // 前のSTEPがクリアしているかどうかの値
    $clear_prev = Clear::where('step_id',$stepId)->where('user_id',$userId)->where('step_child_id',$step_child_prev)->first();
     //dd($clear_prev);
    //dd($clear);
    //dd($step_child_prev);
    return view('child.ditail', compact('stepChild','step','challenge','clear','clear_prev'));
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
    $stepId = optional($stepId->step)->id;
    $step = STEP::with('step_children');
    $step = $step->find($stepId);

    // step_childrenの配列の個数
    $step_child_total_key = count($step->step_children);
    // 現在の子STEPの配列のキー
    $step_child_key = '';
    // 次の子STEPの配列のキー
    $step_child_next = '';

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

    foreach($step->step_children as $key => $step_child){
      if(($step_child['id'] == $stepChildId)){
        $step_child_key = $key;
      }
    }
    // 次の子STEPのID
    if( ($step_child_key+1) !== $step_child_total_key){
      $step_child_next = $step->step_children[$step_child_key+1]->id;
    }

    // 遷移の処理
    if(!empty($step_child_next)){
      return redirect('/step/child/ditail/'.$step_child_next)->with('flash_message', 'クリアしました');
    }else{
      return redirect('/step/ditail/'.$stepId)->with('flash_message', '全部の子STEPをクリアしました');
    }
  }
}
