<template>
  <div>
    <div class="p-account_edit__icon">
      <input type="file" name="pic" accept="image/*" class="p-account_edit__file" v-preview-input="profileImage">
      <img :src="profileImage" class="p-account_edit__img" v-if="profileImage">
      <img alt="no_icon" class="p-account_edit__img" :src="'data:image/png;base64,'+prev_img"  v-else-if="prev_img">
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
      profileImage: null,
    }
  },
}
</script>