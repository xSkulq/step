@php
  $title = 'STEP編集';
@endphp
@extends('layouts.app')

@section('content')
<div class="p-step_edit">

  <!-- main -->
  <h1 class="p-step_edit__title">STEP編集</h1>

  <form method="POST" action="{{ route('step.update',$step->id) }}" class="p-step_edit__form" enctype="multipart/form-data">
    @csrf

    {{-- STEP --}}
    <div>
      {{-- title --}}
      <div>
        <label for="title" class="p-step_edit__label">
          <div class="u-flex__space">
            <p>タイトル<span class="p-step_edit__required">*必須</span></p>
            @error('title')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-mt5 u-mb25">
          <input type="text" name="title" class="c-inputFild__long @error('title') c-inputFild__long-error @enderror" placeholder="英語を最速で学ぶ方法" value="@if(!empty($step->title)){{ $step->title}}@else{{ old('title')}}@endif">
          </div>
        </label>
      </div>

      {{-- STEPカテゴリ --}}
      <div>
        <label for="category" class="p-step_edit__label">
          <div class="u-flex__space">
            <p>STEPカテゴリ<span class="p-step_edit__required">*必須</span></p>
            @error('category_id')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="p-step_edit__select__category @error('category_id') p-step_register__select__error @enderror">
            {{ Form::select('category_id', $categories, $step->category_id, ['class' => 'c-select', 'id' => 'category_id']) }}
          </div>
        </label>
      </div>

      {{-- 目安達成時間 --}}
      <div>
        <label for="criterion" class="p-step_edit__label">
          <div>
            <p class="u-mb10">目安達成時間<span class="p-step_register__required">(半角数字で入力してください)</span><span class="p-step_edit__required">*必須</span></p>
            <div class="u-flex__space">
              @error('achievement_number')<div class="c-inputFild__error">{{ $message }}</div>@enderror
              @error('time')<div class="c-inputFild__error">{{ $message }}</div>@enderror
              </div>
          </div>

          <div class="u-flex">
            <div class="u-mt5 u-mb25">
              <input type="text" name="achievement_number" class="c-inputFild__long p-step_edit__input__time @error('achievement_number') c-inputFild__long-error @enderror" placeholder="12" value="@if(!empty($step->achievement_number)){{ $step->achievement_number}}@else{{ old('achievement_number')}}@endif">
            </div>
            <div class="p-step_edit__select__time @error('time') p-step_register__select__error @enderror">
              <select @if($step->time === '' ) selected @endif name="time" class="c-select">
                <option value="">選択</option>
                <option @if('分' === $step->time ) selected @endif value="分">分</option>
                <option @if('時間' === $step->time ) selected @endif value="時間">時間</option>
                <option @if('日' === $step->time ) selected @endif value="日">日</option>
                <option @if('ヶ月' === $step->time ) selected @endif value="ヶ月">ヶ月</option>
                <option @if('年' === $step->time) selected="selected"@endif value="年">年</option>
              </select>
            </div>
          </div>
        </label>
      </div>

      {{-- STEPの内容 --}}
      <div>
        <label for="content" class="p-account_edit__font">
          <div class="u-flex__space">
            <p>内容<span class="p-step_edit__required">*必須</span></p>
            @error('content')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-mt5 u-mb25">
            <textarea name="content" cols="30" rows="10"
             class="c-inputFild__textarea p-step_edit__textarea @error('content') c-inputFild__textarea-error @enderror"
             placeholder="英語をなるべく早く学べるように学ぶ順番を書いてみました">@if(!empty($step->content)){{ $step->content}}@else{{ old('content')}}@endif</textarea>
          </div>
        </label>
      </div>

      {{-- img --}}
      <div>
        <div class="u-flex__space u-mb5">
          <p>STEPのTOP画像<span class="p-step_edit__required">*512KB以下</span></p>
          @error('pic')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>
  
        <!--<div class="p-step_edit__icon-destory">
          <label>
          <i class="far fa-times-circle p-step_register__icon-destory__pointer"></i>
          <input type="submit" name="img_destory" class="p-step_edit__img-destory" value="アイコンを削除します">
          </label>
        </div>-->
        
        <div>
          <label for="icon">
            <div>
              <input type="submit" name="img_destory" class="p-child_edit__img__destory" value="保存していた画像を削除します">
            </div>
            <step-img-preview :prev_img={{ json_encode($step->pic) }}></step-img-preview>
          </label>
        </div>
      </div>
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