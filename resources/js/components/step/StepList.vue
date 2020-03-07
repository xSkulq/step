<template>
  <div>
      <div class="p-step_list__item" v-for="(step, index) in steps" :key="index">
      <div class="p-step_list__top">
        <div class="u-flex__center">
          <img alt="アイコン" class="p-step_list__img" v-if="step.user.pic" v-bind:src="'/storage/' + step.user.pic">
          <img alt="no-img" class="p-step_list__img" v-else src="/imges/no_image.png">
          <p class="p-step_list__name">{{ step.user.name}}</p>
        </div>
        <div>
          <p class="p-step_list__day">{{ formatDate(step.created_at) }}</p>
          <p class="p-step_list__criterion" v-if="step.achievement_time">目安達成時間<span>{{ step.achievement_time }}</span></p>
          <p v-else></p>
        </div>
      </div>
      <div class="p-step_list__medium">
        <p class="u-mb5">STEP</p>
        <a :href="'/step/ditail/' + step.id" class="p-step_list__medium-link">
          <p class="p-step_list__medium-font">{{ step.title}}</p>
          </a>
      </div>
      <div class="p-step_list__bottom">
        <div>
          <p class="p-step_list__bottom-font">{{ step.category }}</p>
        </div>
      </div>
    </div>
  </div>
    </template>
<script>
export default {
  data: function(){
    return {
      steps: {}
    }
  },
  mounted() {
    this.fetchList()
  },
  methods:{
    // step一覧の情報を取得
    fetchList(){
      const url = 'api/home';
      axios.get(url).then(response => {
        this.steps = response.data
        console.log('this.steps :', this.steps);
      }).catch(error => console.log(error, 'エラー'))
    },
    formatDate: function(date){
      // 日付をYYYY/MM/DD
      if(!date) return '-';
      return moment(date).format('YYYY/MM/DD');
    },
  }
}
</script>