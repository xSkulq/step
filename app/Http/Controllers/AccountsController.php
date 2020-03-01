<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AccountsController extends Controller
{

  // プロフィール編集画面を表示
  public function edit(Request $request)
  {
    $user = Auth::user();
    //$user = DB::table('users')->where('id', $userId)->get();
    //$user = $user->json_encode();
    //dd($user);
    return view('account.edit', compact('user'));
  }

  public function api_edit(Request $request)
  {
    //dd($request->all());
    // プロフィール編集からpostされたjsonをデコード
    //$arrayUser = json_decode($request->all(), true);
    //dd($arrayUser);
    $validator = Validator::make($request->all(), [
      'email' => 'required|string|max:255|email',
      'name' => 'nullable|string|max:255',
      'bio' => 'nullable|string',
      'pic' => 'nullable|image'
    ]);

    // エラーがあった場合プロフィール編集画面にエラーを返す
    if ($validator->fails()) {
      return compact('validator');
    }

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

  }

  // プロフィール編集画面の送信された情報を保存
  public function store(Request $request)
  {
    $request->validate([
      'email' => 'required|string|max:255|email',
      'name' => 'nullable|string|max:255',
      'bio' => 'nullable|string',
      'pic' => 'nullable|string|max:255'
    ]);

    // userテーブルの更新
    $userId = Auth::id();
    $user = User::find($userId);
    $user->fill($request->all())->save();
    //Auth::user()->$user->fill($request->all())->save();
    return redirect('/home');
  }
}
