<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AccountsController extends Controller
{

  // プロフィール編集画面を表示
  public function edit(Request $request)
  {
    $user = Auth::user();
    return view('account.edit', compact('user'));
  }

  /*public function api_edit(Request $request)
  {
    //dd($request->all());
    //dd($arrayUser);
    $validator = Validator::make($request->all(), [
      'email' => 'required|string|max:255|email',
      'name' => 'nullable|string|max:255',
      'bio' => 'nullable|string',
      'pic' => 'nullable|image'
    ]);

      // userid
      dd($request->all());
      $userId = Auth::id();
      $user = User::find($userId);
      $user->email = $request->email;
      $user->name = $request->name;
      $user->bio = $request->bio;
      //dd($user);
    //dd(request()->pic);
    if (request()->pic) {
      $file_name = time() . '.' . request()->pic->getClientOriginalName();
      request()->pic->storeAs('public', $file_name);
      $user->pic = 'storage/' . $file_name;
    }
      $user->save();
      return $user;

  }*/

  // プロフィール編集画面の送信された情報を保存
  public function store(Request $request)
  {
    // userテーブルの更新
    $userId = Auth::id();
    $user = User::find($userId);

    // アイコンの隣の×ボタンを押したときの処理
    if ($request->input('img_destory')){
      // 画像を消去する処理
      $deletePic = $user->pic;
      $user->pic = '';
      Storage::delete('public/'.$deletePic);
      $user->save();
    }

    // バリデーション
    $request->validate([
      'email' => 'required|string|max:191|unique:users,email,'.Auth::user()->email.',email',
      'name' => 'nullable|string|max:191',
      'bio' => 'nullable|string',
      'pic' => 'nullable|image'
    ]);

    $user->email = $request->email;
    $user->name = $request->name;
    $user->bio = $request->bio;

    // アイコンにファイルが追加され保存したときの処理
    if ($request->pic) {

      // 前の画像を消去する処理
      $deletePic = $user->pic;
      Storage::delete('public/'.$deletePic);

      // 送信されたファイルをstoreに保存する処理
      $file_name = time() . '.' . $request->pic->getClientOriginalName();
      $request->pic->storeAs('public', $file_name);
      //$user->pic = 'storage/' . $file_name;

      // userにpicの値を格納
      $user->pic = $file_name;
    }
    $user->save();
    return redirect('/account/edit');
  }
}
