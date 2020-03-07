<template>
  <div>
      <div class="p-step_mypage__item" v-for="(step, index) in steps" :key="index">
      <div class="p-step_mypage__top">
        <div class="u-flex__center">
          <!--<img src="" alt="アイコン" class="p-step_mypage__img">-->
          <img alt="アイコン" class="p-step_mypage__img" v-if="step.user.pic" v-bind:src="'/storage/' + step.user.pic">
          <p class="p-step_mypage__name">{{ step.user.name }}</p>
        </div>
        <div>
          <p class="p-step_mypage__day">{{ formatDate(step.created_at) }}</p>
          <p class="p-step_mypage__criterion" v-if="step.achievement_time">目安達成時間<span>{{ step.achievement_time }}</span></p>
          <p v-else></p>
        </div>
      </div>
      <div class="p-step_mypage__medium">
        <p class="u-mb5">STEP</p>
        <a :href="'/step/ditail/' + step.id" class="p-step_mypage__medium-link">
        <p class="p-step_mypage__medium-font">{{ step.title }}</p>
        </a><!-- TODO: クラス名いいの思いついたら変える -->
      </div>
      <div class="p-step_mypage__bottom">
        <div>
          <p class="p-step_mypage__bottom-font">{{ step.category }}</p>
        </div>
        <!--<div class="u-flex">
          <p class="p-step_mypage__bottom-font">pv<span>1000</span></p>
          <p class="p-step_mypage__bottom-font">-->
            <!-- iタグをいれる(チャレンジ数にちなんだ) -->
          <!--  <span>1000</span>
          </p>
          <p class="p-step_mypage__bottom-font">-->
            <!-- iタグをいれる(ハートのアイコン) -->
          <!--  <span>1000</span>
          </p>
        </div>-->
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
      const url = '/api/step/mypage_register';
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