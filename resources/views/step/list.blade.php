@extends('layouts.app')

@section('content')
<div class="p-step_list">

  <!-- main -->
  <h1 class="p-step_list__title">STEP一覧</h1>
  <p class="p-step_list__category">カテゴリ</p>

  <!-- step-list -->
  <section>
    <step-list></step-list>
  </section>
</div>

@endsection