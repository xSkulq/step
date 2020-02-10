<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StepsController extends Controller
{
  public function index()
  {
    return view('step.list');
  }

  public function new()
  {
    return view('step.register');
  }

  public function edit()
  {
    return view('step.edit');
  }

  public function show()
  {
    return view('step.ditail');
  }

  public function mypage_register()
  {
    return view('step.mypage_register');
  }

  public function mypage_challenge()
  {
    return view('step.mypage_challenge');
  }

  public function child_new()
  {
    return view('child.register');
  }

  public function child_edit()
  {
    return view('child.edit');
  }
}
