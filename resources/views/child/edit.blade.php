@extends('layouts.app_own_column')

@section('content')
<div class="">

  <!-- main -->
  <h1>子STEP編集</h1>

  <!-- step-list -->
  <section>
    <div>
      <div>
        <label>
          タイトル
          <input type="text" placeholder="タイトル">
        </label>
      </div>
      <div>
        <label>
          内容
          <textarea cols="30" rows="10" placeholder="内容"></textarea>
        </label>
      </div>
    </div>
    <div>
      <button type="submit">登録</button>
    </div>
  </section>
</div>

@endsection