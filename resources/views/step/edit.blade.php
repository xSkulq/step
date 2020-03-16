@extends('layouts.app_own_column')

@section('content')
<div class="p-step_edit">

  <!-- main -->
  <h1 class="p-step_edit__title">STEP編集</h1>

  <form method="POST" action="{{ route('step.update',$step->id) }}" class="p-step_edit__form">
    @csrf

    {{-- title --}}
    <div>
      <label for="title" class="p-step_edit__label">
        <div class="u-flex__space">
          <p>タイトル</p>
          @error('title')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5 u-mb20">
          <input type="text" name="title" class="c-inputFild__long @error('title') c-inputFild__long-error @enderror"
                 placeholder="タイトル" value="@if(!empty(old('title'))){{ old('title')}}@else{{ $step->title }}@endif">
        </div>
      </label>
    </div>

    {{-- STEPカテゴリ --}}
    <div>
      <label for="category" class="p-step_edit__label">
        <div class="u-flex__space">
          <p>STEPカテゴリ</p>
          @error('category')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5 u-mb20">
          <input type="text" name="category" class="c-inputFild__long @error('category') c-inputFild__long-error @enderror" 
                 placeholder="STEPカテゴリ" value="@if(!empty(old('category'))){{ old('category')}}@else{{ $step->category }}@endif">
        </div>
      </label>
    </div>

    {{-- 目安達成時間 --}}
    <div>
      <label for="criterion" class="p-step_edit__label">
        <div class="u-flex__space">
          <p>目安達成時間</p>
          @error('achievement_time')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5 u-mb20">
          <input type="text" name="achievement_time" class="c-inputFild__long @error('achievement_time') c-inputFild__long-error @enderror" 
                 placeholder="目安達成時間" value="@if(!empty(old('achievement_time'))){{ old('achievement_time')}}@else{{ $step->achievement_time }}@endif">
        </div>
      </label>
    </div>

    {{-- STEPの内容 --}}
    <div>
      <label for="content" class="p-step_edit__font">
        <div class="u-flex__space">
          <p>内容</p>
          @error('content')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5 u-mb55">
          <textarea name="content" cols="30" rows="10" class="c-inputFild__textarea p-step_edit__textarea @error('content') c-inputFild__textarea-error @enderror" placeholder="内容">@if(!empty(old('content'))){{ old('content')}}@else{{ $step->content }}@endif</textarea>
        </div>
      </label>
    </div>

    {{-- ボタン --}}
    <div class="u-mb55 u-flex__center">
      <button class="c-button p-step_edit__button-font" type="submit">
        保存
      </button>
    </div>

  </form>
  
</div>

@endsection