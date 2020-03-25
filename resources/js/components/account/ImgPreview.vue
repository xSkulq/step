<template>
  <div>
    <div class="p-account_edit__icon-destory">
      <label>
        <!--<i class="far fa-times-circle p-account_edit__icon-destory__pointer" v-on:click="imgDestory()"></i>--><!-- TODO: 後で消す -->
        <i class="far fa-times-circle p-account_edit__icon-destory__pointer" v-on:click="resetFile()"></i>
        <!--<input type="submit" name="img_destory" class="p-account_edit__img-destory" value="アイコンを削除します">--><!-- TODO: 後で消す -->
      </label>
    </div>
    <div class="p-account_edit__icon">
      <!--<input type="file" ref="file" name="pic" accept="image/*" class="p-account_edit__file" v-preview-input="profileImage ">--><!-- TODO: 後で消す -->
      <input type="file" ref="file" name="pic" accept="image/*" class="p-account_edit__file" @change="onFileChange($event)">
      <!--<img :src="profileImage" class="p-account_edit__img" v-if="profileImage">-->
      <img :src="imageData" class="p-account_edit__img" v-if="imageData">
      <img alt="no_icon" class="p-account_edit__img" :src="'data:image/png;base64,'+prevImg"  v-else-if="prevImg">
      <img alt="no_icon" class="p-account_edit__img" src="/imges/no_image.png" v-else>
    </div>
  </div>
</template>

<script>
import previewInput from 'v-preview-input'
export default {
  //inheritAttrs: false, 
  props: {
    prev_img:{
      type: String,
      required: false
    },
  },
  data: function(){
    return {
      profileImage: null, //TODO後で消す
      prevImg: this.prev_img,
      imageData: ''
    }
  },
  methods:{
    imgDestory: function(){ //TODO: 後で消す
      this.prevImg = '';
      this.profileImage = null;
    },
    resetFile() {
      const input = this.$refs.file;
      input.type = 'text';
      input.type = 'file';
      this.imageData = '';
      this.prevImg = '';
    },
    onFileChange(e) {

    const files = e.target.files;

    if(files.length > 0) {

        const file = files[0];
        const reader = new FileReader();
        reader.onload = (e) => {
            this.imageData = e.target.result;
        };
        reader.readAsDataURL(file);
    }
},
  }
}
</script>