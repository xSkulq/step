@extends('layouts.app_own_column')

@section('content')
<div class="p-step_register">

  <!-- main -->
  <h1 class="p-step_register__title">STEP新規登録</h1>

  <p class="p-step_register__note">*STEPと子STEP1を登録してください</p>
  <p class="p-step_register__sub-title">STEPを登録</p>

  <form method="POST" action="{{ route('step.store') }}" class="p-step_register__form" enctype="multipart/form-data">
    @csrf

    {{-- STEP --}}
    <div>
      {{-- title --}}
      <div>
        <label for="title" class="p-step_register__label">
          <div class="u-flex__space">
            <p>タイトル<span class="p-step_register__required">*必須</span></p>
            @error('title')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-mt5 u-mb25">
            <input type="text" name="title" class="c-inputFild__long @error('title') c-inputFild__long-error @enderror" placeholder="英語を最速で学ぶ方法" value="{{ old('title') }}">
          </div>
        </label>
      </div>

      {{-- STEPカテゴリ --}}
      <div>
        <label for="category" class="p-step_register__label">
          <div class="u-flex__space">
            <p>STEPカテゴリ<span class="p-step_register__required">*必須</span></p>
            @error('category')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="p-step_register__select__category">
            <!-- categoryセレクト -->
            {{ Form::select('category_id', $categories, null, ['class' => 'c-select', 'id' => 'category_id']) }}
          </div>
        </label>
      </div>

      {{-- 目安達成時間 --}}
      <div>
        <label for="criterion" class="p-step_register__label">
          <div class="u-flex__space">
            <p>目安達成時間<span class="p-step_register__required">*必須</span></p>
            @error('achievement_time')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-flex">
            <div class="u-mt5 u-mb25">
              <input type="text" name="achievement_time" class="c-inputFild__long @error('achievement_time') c-inputFild__long-error @enderror" placeholder="12" value="{{ old('achievement_time') }}">
            </div>
            <div class="p-step_register__select__time">
              <select name="time" class="c-select">
                <option selected="selected" value="">選択</option>
                <option value="分">分</option>
                <option value="時間">時間</option>
                <option value="日">日</option>
                <option value="ヶ月">ヶ月</option>
              </select>
            </div>
          </div>
        </label>
      </div>

      {{-- STEPの内容 --}}
      <div>
        <label for="content" class="p-account_edit__font">
          <div class="u-flex__space">
            <p>内容<span class="p-step_register__required">*必須</span></p>
            @error('content')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-mt5 u-mb25">
            <textarea name="content" cols="30" rows="10" class="c-inputFild__textarea p-step_register__textarea @error('content') c-inputFild__textarea-error @enderror" placeholder="英語をなるべく早く学べるように学ぶ順番を書いてみました">{{ old('content') }}</textarea>
          </div>
        </label>
      </div>

      {{-- img --}}
      <div>
        <div class="u-flex__space u-mb5">
          <p>STEPのTOP画像<span class="p-step_register__required">*512KB以下</span></p>
          @error('pic')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>
  
        <div class="p-step_register__icon-destory">
          <label>
          <i class="far fa-times-circle p-step_register__icon-destory__pointer"></i>
          <input type="submit" name="img_destory" class="p-step_register__img-destory" value="アイコンを削除します">
          </label>
        </div>
        
        <div class="p-step_register__icon">
          <label for="icon">
            <input type="file" name="pic" class="p-step_register__file">
            @if(empty($user->pic))
            <img alt="no_icon" class="p-step_register__img" src="/imges/no_image.png">
            @else
            <!--<img alt="アイコン" class="p-step_register__img" src="data:image/png;base64,">-->
            <!-- 画像プレビューの機能を後で追加する -->
            <img alt="アイコン" class="p-step_register__img" src="/storage/{{ $step->pic }}">
            @endif
          </label>
        </div>
      </div>
    </div>

    {{-- border --}}
    <div class="p-step_register__border"></div>

    {{-- 子STEP1 --}}
    <div>
      <p class="p-step_register__sub-title">子STEP1を登録</p>
      {{-- title --}}
      <div class="u-mb25">
        <label for="title" class="p-step_register__label">
          <div class="u-flex__space">
            <p>タイトル<span class="p-step_register__required">*必須</span></p>
            @error('title')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-mt5 5">
            <input type="text" name="child_title" class="c-inputFild__long @error('title') c-inputFild__long-error @enderror" placeholder="〇〇本を読もう！！" value="{{ old('title') }}">
          </div>
        </label>
      </div>

      {{-- STEPの内容 --}}
      <div>
        <label for="content" class="p-account_edit__font">
          <div class="u-flex__space">
            <p>内容<span class="p-step_register__required">*必須</span></p>
            @error('content')<div class="c-inputFild__error">{{ $message }}</div>@enderror
          </div>

          <div class="u-mt5 u-mb25">
            <textarea name="child_content" cols="30" rows="10" class="c-inputFild__textarea p-step_register__textarea @error('content') c-inputFild__textarea-error @enderror" placeholder="〇〇の本は簡単な英語しか書いてなく読みやすいので勉強になります">{{ old('content') }}</textarea>
          </div>
        </label>
      </div>

      {{-- img --}}
      <div>
        <div class="u-flex__space u-mb5">
          <p>子STEP1のTOP画像<span class="p-step_register__required">*512KB以下</span></p>
          @error('pic')<div class="c-inputFild__error">{{ $message }}</div>@enderror
        </div>
  
        <div class="p-step_register__icon-destory">
          <label>
          <i class="far fa-times-circle p-step_register__icon-destory__pointer"></i>
          <input type="submit" name="child_img_destory" class="p-step_register__img-destory" value="アイコンを削除します">
          </label>
        </div>
        
        <div class="p-step_register__icon">
          <label for="icon">
            <input type="file" name="child_pic" class="p-step_register__file">
            @if(empty($user->pic))
            <img alt="no_icon" class="p-step_register__img" src="/imges/no_image.png">
            @else
            <img alt="アイコン" class="p-step_register__img" src="/storage/{{ $stepChild->pic }}">
            @endif
              <!--<img alt="" class="p-account_edit__img" v-bind:src="'/' + user_edit.pic">-->
          </label>
        </div>
      </div>

    {{-- ボタン --}}
    <div class="u-flex__center">
      <button class="c-button p-step_register__button-font" type="submit">
        保存
      </button>
    </div>

  </form>
  
</div>

@endsection