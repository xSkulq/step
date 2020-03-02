<template>
  <div class="p-account_edit"> 
    <h1 class="p-account_edit__title">プロフィール編集</h1>

    <!-- email -->
    <div>
      <label for="email" class="p-account_edit__font">メールアドレス</label>

        <div class="u-mt5 u-mb20">
          <input type="email" name="email" class="c-inputFild__long" placeholder="メールアドレス" v-model="user_edit.email">
        </div>
    </div>

    <!-- name -->
    <div>
      <label for="name" class="p-account_edit__font">名前</label>
        <div class="u-mt5 u-mb20">
          <input type="name" name="name" class="c-inputFild__long" placeholder="名前" v-model="user_edit.name">
        </div>
    </div>

    <!-- bio -->
    <div>
      <label for="content" class="p-account_edit__font">自己紹介</label>
      <div class="u-mt5 u-mb20">
        <textarea name="bio" cols="30" rows="10" class="c-inputFild__textarea p-account_edit__textarea" placeholder="自己紹介" v-model="user_edit.bio"></textarea>
      </div>
    </div>

    <!-- icon -->
    <div>
      <span>アイコン</span>
      <div class="p-account_edit__icon">
        <label for="icon">
        <template>
          <input type="file" name="pic" class="p-account_edit__file" v-on:change="onFileChange">
          <img alt="アイコン" class="p-account_edit__img" v-show="uploadedImage" :src="uploadedImage">
          <!--<img alt="no_icon" class="p-account_edit__img" v-else src="/imges/no_image.png">-->
            <!--<img alt="" class="p-account_edit__img" v-bind:src="'/' + user_edit.pic">-->
            ファイル選択
        </template>
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
  props: {
    user: {
      type: Object
    }
  },
  data: function(){
    return {
      fileInfo: '',
      user_edit: '',
      showUserImage: false
    }
  },
  created(){
    const original_user = this.user
    this.user_edit = {
      email: original_user.email,
      name: original_user.name,
      bio: original_user.bio,
      pic: original_user.pic
    }
  },
  methods:{
    // 選択された画像を変数に保存
    fileSelected(event){
      console.log(event);
      this.user_edit.pic = event.target.files[0]
      this.createImage(this.user_edit.pic);
    },
    // アップロードした画像を表示
    createImage(file) {
      let reader = new FileReader();
      reader.onload = (e) => {
        this.uploadedImage = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    fileUpload(){
      const formData = new FormData()
      formData.append('email',this.user_edit.email)
      formData.append('name',this.user_edit.name)
      formData.append('bio',this.user_edit.bio)
      formData.append('pic',this.user_edit.pic)
      //console.log(formData);

      axios.post('/api/account/edit',formData).then(response =>{
        console.log(response, 'response')
        //this.user_edit = response.data
          //if(response.data.pic) this.showUserImage = true
      })
    }
  }
}
</script>