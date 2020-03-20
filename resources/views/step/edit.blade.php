@extends('layouts.app_own_column')

@section('content')
<div class="p-step_edit">

  <!-- main -->
  <h1 class="p-step_edit__title">STEP編集</h1>

  <form method="POST" action="{{ route('step.update',$step->id) }}" class="p-step_edit__form">
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
            <input type="text" name="title" class="c-inputFild__long @error('title') c-inputFild__long-error @enderror" placeholder="英語を最速で学ぶ方法" value="{{ old('title') }}">
          </div>
        </label>
      </div>

      {{-- STEPカテゴリ --}}
      <div>
        <label for="category" class="p-step_edit__label">
          <div class="u-flex__space">
            <p>STEPカテゴリ<span class="p-step_edit__required">*必須</span></p>
            @error('category')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="p-step_edit__select__category">
            <select name="pref_id" class="c-select">
              <option selected="selected" value="">選択してください</option>
              <option value="1">プログラミング</option>
              <option value="1">イラスト</option>
              <option value="47">英語</option>
            </select>
          </div>
        </label>
      </div>

      {{-- 目安達成時間 --}}
      <div>
        <label for="criterion" class="p-step_edit__label">
          <div class="u-flex__space">
            <p>目安達成時間<span class="p-step_edit__required">*必須</span></p>
            @error('achievement_time')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-flex">
            <div class="u-mt5 u-mb25">
              <input type="text" name="achievement_time" class="c-inputFild__long @error('achievement_time') c-inputFild__long-error @enderror" placeholder="12" value="{{ old('achievement_time') }}">
            </div>
            <div class="p-step_edit__select__time">
              <select name="pref_id" class="c-select">
                <option selected="selected" value="">選択</option>
                <option value="1">日</option>
                ...
                <option value="47">時間</option>
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
            <textarea name="content" cols="30" rows="10" class="c-inputFild__textarea p-step_edit__textarea @error('content') c-inputFild__textarea-error @enderror" placeholder="英語をなるべく早く学べるように学ぶ順番を書いてみました">{{ old('content') }}</textarea>
          </div>
        </label>
      </div>

      {{-- img --}}
      <div>
        <div class="u-flex__space u-mb5">
          <p>STEPのTOP画像<span class="p-step_edit__required">*512KB以下</span></p>
          @error('pic')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>
  
        <div class="p-step_edit__icon-destory">
          <label>
          <i class="far fa-times-circle p-step_register__icon-destory__pointer"></i>
          <input type="submit" name="img_destory" class="p-step_edit__img-destory" value="アイコンを削除します">
          </label>
        </div>
        
        <div class="p-step_edit__icon">
          <label for="icon">
            <input type="file" name="pic" class="p-step_edit__file">
            @if(empty($user->pic))
            <img alt="no_icon" class="p-step_edit__img" src="/imges/no_image.png">
            @else
            <img alt="アイコン" class="p-step_edit__img" src="data:image/png;base64,{{ $user->pic }}">
            @endif
              <!--<img alt="" class="p-account_edit__img" v-bind:src="'/' + user_edit.pic">-->
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