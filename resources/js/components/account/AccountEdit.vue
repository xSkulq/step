<template>
  <div class="p-account_edit"> 
    <h1 class="p-account_edit__title">プロフィール編集</h1>

    <!-- email -->
    <div>
      <label for="email" class="p-account_edit__font">メールアドレス</label>

        <div class="u-mt5 u-mb20">
          <input type="email" name="email" class="c-inputFild__long" placeholder="メールアドレス" value>
        </div>
    </div>

    <!-- name -->
    <div>
      <label for="name" class="p-account_edit__font">名前</label>
        <div class="u-mt5 u-mb20">
          <input type="name" name="name" class="c-inputFild__long" placeholder="名前" value>
        </div>
    </div>

    <!-- bio -->
    <div>
      <label for="content" class="p-account_edit__font">自己紹介</label>
      <div class="u-mt5 u-mb20">
        <textarea name="bio" cols="30" rows="10" class="c-inputFild__textarea p-account_edit__textarea" placeholder="自己紹介"></textarea>
      </div>
    </div>

    <!-- icon -->
    <div>
      <span>アイコン</span>
      <div class="p-account_edit__icon">
        <label for="icon">
          <input type="file" name="pic" class="p-account_edit__file" v-on:change="fileSelected">
            <img alt="" class="p-account_edit__img">
            ファイル選択
        </label>
      </div>
    </div>

    <!-- button -->
    <div class="u-mb55 u-flex__center">
      <button class="c-button p-account_edit__button-font" type="submit" v-on:click="fileUpload">
        保存
      </button>
    </div>
  </div>
</template>


<script>
export default {
  data: function(){
    return {
      fileInfo: '',
      user: '',
      showUserImage: false
    }
  },
  methods:{
    fileSelected(event){
      console.log(event);
      // 選択された画像
      this.fileInfo = event.target.files[0]
    },
    fileUpload(){
      const formData = new FormData()
      formData.append('file',this.fileInfo)

      axios.post('/api/account/edit',formData).then(response =>{
        this.user = response.data
          if(response.data.pic) this.showUserImage = true
      });
    }
  }
}
</script>