<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;


class AccountsController extends Controller
{

  public function edit(Request $request)
  {
    $userId = Auth::id();
    $user = DB::table('users')->where('id', $userId)->first();
    //dd($user);
    return view('account.edit', compact('user'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'email' => 'required|string|max:255|email',
      'name' => 'nullable|string|max:255',
      'bio' => 'nullable|string',
      'pic' => 'nullable|string|max:255'
    ]);

    // DBに保存する値をセット
    $user = new User();
    //$user->fill($request->all())->save();
    Auth::user()->$user->fill($request->all())->save();
    return redirect('/home');
  }
}
