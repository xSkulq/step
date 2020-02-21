<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StepChildrenController extends Controller
{
  public function child_new()
  {
    $userId = Auth::id();
    dd($userId);
    return view('child.register');
  }

  public function child_edit()
  {
    return view('child.edit');
  }
}
