<?php

namespace App\Http\Controllers;

use App\Step;
use App\User;
use App\StepChild;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StepChildrenController extends Controller
{

  // step詳細画面を表示
  public function show($id)
  {
    //dd($id);
    // step_childのid
    $stepChildId = $id;
    // userのid
    $userId = Auth::id();
    // 詳細用のstep_childのデータ
    $stepChild = StepChild::with(['step']);
    $stepChild = $stepChild->where('id', $stepChildId)->first();

    // stepのid
    $stepId = $stepChild->step->id;
    // step一覧のデータ
    $step = Step::with(['user','step_children']);
    $step = $step->where('id',$stepId)->where('user_id',$userId)->first();
    //dd($step);
    return view('child.ditail', compact('stepChild','step'));
  }


  public function new($id)
  {
    $stepId = $id;
    //dd($stepId);
    $userId = Auth::id();
    //dd($userId);
    return view('child.register', compact('stepId'));
  }

  public function edit($id)
  {
    $stepChildId = $id;
    $stepChild = StepChild::where('id',$stepChildId)->first();
    return view('child.edit', compact('stepChild'));
  }

    // 新規子STEP登録の送信された情報を保存
    public function store(Request $request,$id)
  {
    //dd($id);
    $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required|string'
    ]);

    //dd($request);
    // stepのid
    $stepId = $id;

    $step_child = new StepChild();
    $step_child->step_id = $stepId;
    $step_child->title = $request->title;
    $step_child->content = $request->content;
    $step_child->save();
    return redirect('/step/ditail/'.$stepId);
  }

  public function update(Request $request, $id)
  {

    $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required|string'
    ]);

    // step_childのid
    $stepChildId = $id;
    $stepChild = StepChild::find($stepChildId);
    $stepChild->fill($request->all())->save();
    return redirect('/step/child/ditail/'.$stepChildId);
  }
}
