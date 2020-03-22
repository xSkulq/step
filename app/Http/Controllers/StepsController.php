<?php

namespace App\Http\Controllers;
use App\Step;
use App\StepChild;
use App\Challenge;
use App\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class StepsController extends Controller
{
  // step一覧
  public function index(Request $request)
  {
    // categoryボックス
    $categories = Category::orderBy('code','asc')->pluck('name', 'code');
    $categories = $categories -> prepend('カテゴリ名', '');
    // 検索ボックス
    $search = $request->input('search');
    // 選択されたcategoryのid
    $category = $request->input('category_id');
    return view('step.list',compact('search','categories','category'));
  }

  public function api_index(Request $request)
  {
    //dd($request);
    $search = $request->input('search');
    $category = $request->input('category_id');
    $steps = Step::with(['user','category']);

    // searchがある場合
    if (!empty($search) && !empty($category)) {
      $steps = $steps->where('title',$search)->orWhere('total_time',$search)->orWhereHas('user', function ($q) use ($search){// 作成日で検索ができないので後で考える
        $q->where('name', $search);
      });
      $steps = $steps->WhereHas('category', function ($q) use ($category){
        $q->where('id', $category);
      });
    }else if(!empty($search) && empty($category)){
      $steps = $steps->where('title',$search)->orWhere('total_time',$search)->orWhereHas('user', function ($q) use ($search){
        $q->where('name', $search);
      });
    }else if(empty($search) && !empty($category)){
      $steps = $steps->WhereHas('category', function ($q) use ($category){
        $q->where('id', $category);
      });
    }else{
      $steps = $steps;
    }
    
    $steps = $steps->orderBy('created_at', 'desc')->get();
    return response()->json($steps);
  }


  // 新規STEP登録の画面を表示
  public function new()
  {
    $categories = Category::orderBy('code','asc')->pluck('name', 'code');
    $categories = $categories -> prepend('選択してください', '');
    return view('step.register',compact('categories'));
  }
  

  // 新規STEP登録の送信された情報を保存
  public function store(Request $request)
  {
    //dd($request->achievement_time.$request->time);
    //dd($request);
    // アイコンの隣の×ボタンを押したときの処理
    /*if ($request->input('img_destory')){
      // 画像を消去する処理
      $deletePic = $step->pic;
      $user->pic = '';
      Storage::delete('public/'.$deletePic);
      $user->save();
    }*/

    $request->validate([
      'title' => 'required|string|max:191',
      'category_id' => 'required|string',
      'achievement_number' => 'required|numeric|max:25',
      'time' => 'required|max:25',
      'content' => 'required|string',
      'pic' => 'nullable|image',
      //'pic' => 'nullable|image|max:512',
      'child_title' => 'required|string|max:191',
      'child_content' => 'required|string',
      'child_pic' => 'nullable|image'
    ]);

    $step = new Step();
    $stepChild = new StepChild();
    $userId = Auth::id();
    // 数字　+ セレクトで選ばれた時間の単位
    $achivementTime = $request->achievement_number.$request->time;

    // stepの値を保存
    $step->user_id = $userId;
    $step->title = $request->title;
    $step->category_id = $request->category_id;
    $step->achievement_number = $request->achievement_number;
    $step->total_time = $achivementTime;
    $step->time = $request->time;
    $step->content = $request->content;

    // アイコンにファイルが追加され保存したときの処理
    if ($request->pic) {

      // 送信されたファイルをstoreに保存する処理
      $file_name = time() . '.' . $request->pic->getClientOriginalName();
      $request->pic->storeAs('public', $file_name);

      // userにpicの値を格納
      $step->pic = $file_name;
    }
    // stepの値を保存
    $step->save();

    // stepChildの値を保存
    $stepChild->user_id = $userId;
    $stepChild->step_id = $step->id;
    $stepChild->title = $request->child_title;
    $stepChild->content = $request->child_content;

    // アイコンにファイルが追加され保存したときの処理
    if ($request->child_pic) {

      // 送信されたファイルをstoreに保存する処理
      $file_name = time() . '.' . $request->child_pic->getClientOriginalName();
      $request->pic->storeAs('public', $file_name);

      // userにpicの値を格納
      $stepChild->pic = $file_name;
    }
    // stepChildの値を保存
    $stepChild->save();
    return redirect('/home')->with('flash_message', '保存が完了しました');
  }


  // step編集画面を表示
  public function edit(Request $request, $id)
  {
    $userId = Auth::id();
    // categoryボックス
    $categories = Category::orderBy('code','asc')->pluck('name', 'code');
    $categories = $categories -> prepend('選択してください', '');
    $step = Step::with(['category']);
    $step = Step::where('user_id', $userId)->find($id);
    return view('step.edit',compact('step','categories'));
  }


  // step詳細画面を表示
  public function show($id)
  {
    // stepのid
    $stepId = $id;
    // userのid
    $userId = Auth::id();
    $step = Step::with(['user','step_children','category']);
    $step = $step->where('id', $stepId)->first();

    // チャレンジしているかの値
    $challenge = Challenge::where('step_id',$stepId)->where('user_id',$userId)->first();
    return view('step.ditail',compact('step','challenge'));
  }

  
  //登録済み一覧を表示
  public function mypage_register(Request $request)
  {
    // categoryボックス
    $categories = Category::orderBy('code','asc')->pluck('name', 'code');
    $categories = $categories -> prepend('カテゴリ名', '');
    // 検索ボックス
    $search = $request->input('search');
    // 選択されたcategoryのid
    $category = $request->input('category_id');

    return view('step.mypage_register',compact('search','categories','category'));
  }

  // 登録済み一覧を表示
  public function api_mypage_register(Request $request)
  {
    // 検索された値
    $search = $request->input('search');
    $category = $request->input('category_id');
    // userid
    $userId = Auth::id();
    $steps = Step::with('user','category');
    $steps = $steps->where('user_id', $userId)->orderBy('created_at', 'desc');

    // searchがある場合
    if (!empty($search) && !empty($category)) {
      $steps = $steps->where('title',$search)->orWhere('total_time',$search);
      $steps = $steps->WhereHas('category', function ($q) use ($category){
        $q->where('id', $category);
      });
    }else if(!empty($search) && empty($category)){
      $steps = $steps->where('title',$search)->orWhere('total_time',$search);
    }else if(empty($search) && !empty($category)){
      $steps = $steps->WhereHas('category', function ($q) use ($category){
        $q->where('id', $category);
      });
    }else{
      $steps = $steps;
    }
    $steps = $steps->get();
    return response()->json($steps);
  }


  // チャレンジ一覧表示
  public function mypage_challenge(Request $request)
  {
    $search = $request->input('search');
    return view('step.mypage_challenge',compact('search'));
  }

  // チャレンジSTEP一覧を表示
  public function api_mypage_challenge(Request $request)
  {
    $search = $request->input('search');

    $challengeSteps = Step::with(['challenges','user','step_children','clears']);
    $challengeSteps = $challengeSteps->WhereHas('challenges', function($query){
        $query->where('challenge_flg',1)->where('user_id',Auth::id());
      });

    // 検索された値がstepのカテゴリに一致するかの処理
    if (!empty($search)) {
      $challengeSteps = $challengeSteps->where('category',$search);
    }
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
