<template>
  <div>
    <div class="p-step_register__icon-destory">
      <label>
        <i class="far fa-times-circle p-step_register__icon-destory__pointer" v-on:click="resetFile()"></i>
      </label>
    </div>
    <div class="p-step_register__icon">
      <input type="file" ref="file" name="pic" accept="image/*" class="p-step_register__file" @change="onFileChange($event)">
      <img :src="imageData" class="p-step_register__img" v-if="imageData">
      <img alt="no_icon" class="p-step_register__img" :src="'data:image/png;base64,'+prevImg"  v-else-if="prevImg">
      <img alt="no_icon" class="p-step_register__img" src="/imges/no_image.png" v-else>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    prev_img:{
      type: String,
      required: false
    },
  },
  data: function(){
    return {
      prevImg: this.prev_img,
      imageData: ''
    }
  },
  methods:{
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