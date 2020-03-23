@extends('layouts.app_own_column')

@section('content')
<div class="p-child_edit">

  <!-- main -->
  <h1 class="p-child_edit__title">子STEP編集</h1>

  <!-- step-list -->
  <form method="POST" action="{{ route('step.child_update',$stepChild->id) }}" class="p-child_edit__form" enctype="multipart/form-data">
    @csrf

    {{-- title --}}
    <div>
      <label for="title" class="p-child_edit__label">
        <div class="u-flex__space">
          <p>タイトル</p>
          @error('title')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="p-child_edit__input">
          <input name="title" type="text" class="c-inputFild__long @error('title') c-inputFild__long-error @enderror" 
                 placeholder="タイトル"　value="@if(!empty(old('title'))){{ old('title')}}@else{{ $stepChild->title }}@endif">
        </div>
      </label>
    </div>

    {{-- STEPの内容 --}}
    <div>
      <label for="content" class="p-child_edit__font">
        <div class="u-flex__space">
          <p>内容</p>
          @error('content')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>

        <div class="u-mt5">
          <textarea name="content" cols="30" rows="10" class="c-inputFild__textarea p-child_edit__textarea @error('content') c-inputFild__textarea-error @enderror" placeholder="内容">@if(!empty(old('content'))){{ old('content')}}@else{{ $stepChild->content }}@endif</textarea>
        </div>
      </label>
    </div>
    
    {{-- img --}}
    <div>
      <div class="u-flex__space u-mb5">
        <p>STEPのTOP画像<span class="p-child_edit__required">*512KB以下</span></p>
        @error('pic')<div class="c-inputFild__error">{{ $message }}</div>@enderror
      </div>
  
      <!--<div class="p-child_edit__icon-destory">
        <label>
          <i class="far fa-times-circle p-child_edit__icon-destory__pointer"></i>
          <input type="submit" name="img_destory" class="p-child_edit__img-destory" value="アイコンを削除します">
        </label>
      </div>-->
        
      <div>
        <label for="icon">
          <step-img-preview :prev_img={{ json_encode($stepChild->pic) }}></step-img-preview>
        </label>
      </div>
    </div>

    {{-- ボタン --}}
    <div class="u-flex__center">
      <button class="c-button p-child_edit__button-font" type="submit">
        保存
      </button>
    </div>

  </form>
</div>

@endsection