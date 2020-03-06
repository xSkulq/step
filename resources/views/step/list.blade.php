@extends('layouts.app')

@section('content')
<div class="p-step_list">
  <div>
    <!-- main -->
    <h1 class="p-step_list__title u-mb80">STEP一覧</h1>
    <!--<p class="p-step_list__category">カテゴリ</p>-->

    <!-- step-list -->
    <section>
      <step-list></step-list>
    </section>
  </div>
</div>

@endsection