<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountsController extends Controller
{
  public function new()
  {
    return view('account.register');
  }

  public function edit()
  {
    return view('account.edit');
  }
}
