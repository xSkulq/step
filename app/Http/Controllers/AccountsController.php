<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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

  // プロフィール編集画面の送信された情報を保存
  public function store(Request $request)
  {
    //dd($request);
    // userテーブルの更新
    $userId = Auth::id();
    $user = User::find($userId);

    // アイコンの隣の×ボタンを押したときの処理
    if ($request->input('img_destory')){
      // 画像を消去する処理
      $user->pic = '';
      $user->save();
      return redirect('/account/edit');
    }

    // バリデーション
    $request->validate([
      'email' => 'required|string|max:191|unique:users,email,'.Auth::user()->email.',email',
      'name' => 'nullable|string|max:191',
      'bio' => 'nullable|string',
      //'pic' => 'nullable|image',
      'pic' => 'nullable|image|max:512'

    ]);

    $user->email = $request->email;
    $user->name = $request->name;
    $user->bio = $request->bio;

    // アイコンにファイルが追加され保存したときの処理
    if ($request->pic) {

      // 画像をバイナリデータで格納
      $file_name = base64_encode(file_get_contents($request->pic));

      // userにpicの値を格納
      $user->pic = $file_name;
    }
    /*if ($request->pic) {

      // 前の画像を消去する処理
      $deletePic = $user->pic;
      Storage::delete('public/'.$deletePic);

      // 送信されたファイルをstoreに保存する処理
      $file_name = time() . '.' . $request->pic->getClientOriginalName();
      $request->pic->storeAs('public', $file_name);

      // userにpicの値を格納
      $user->pic = $file_name;
    }*/
    $user->save();
    return redirect('/account/edit')->with('flash_message', '保存が完了しました');
  }
}
