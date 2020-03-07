<template>
  <div>
    <div class="p-step_mypage__item" v-for="(step, index) in challengeSteps" :key="index">
      <div class="p-step_mypage__top">
        <div class="u-flex">
          <img alt="アイコン" class="p-step_mypage__img" v-if="step.user.pic" v-bind:src="'/storage/' + step.user.pic">
          <p class="p-step_mypage__name">{{ step.user.name }}</p>
        </div>
        <div>
          <p class="p-step_mypage__day">{{ formatDate(step.created_at) }}</p>
          <p class="p-step_mypage__criterion">目安達成時間<span>{{ step.achievement_time }}</span></p>
        </div>
      </div>
      <div class="p-step_mypage__medium">
        <p class="u-mb5">STEP</p>
        <a :href="'/step/ditail/' + step.id" class="p-step_mypage__medium-link">
        <p class="p-step_mypage__medium-font">{{ step.title }}</p>
        </a><!-- TODO: クラス名いいの思いついたら変える -->
      </div>
      <div class="u-mb10">
        <div class="u-flex__space">
          <p v-if="(step.clears.length)">進捗<span>{{ Math.floor(step.clears.length / step.step_children.length * 100)}}%</span></p>
          <p v-else>進捗<span>0%</span></p>
          <p v-if="(step.clears.length)">{{ step.clears.length }}/{{ step.step_children.length}}<span>STEP</span></p>
          <p v-else>0/{{ step.step_children.length}}<span>STEP</span></p>
        </div>
      <!-- プログレスバー -->
        <div class="c-progress" v-if="(step.clears.length)">
          <div class="c-progress__bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" 
               :style="'width:' + Math.floor(step.clears.length / step.step_children.length * 100) + '%'">
            <span>{{ Math.floor(step.clears.length / step.step_children.length * 100) }}%</span>
          </div>
        </div>

        <div class="c-progress" v-else>
          <div class="c-progress__bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:0%">
            <span>0%</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function(){
    return {
      challengeSteps: {}
    }
  },
  mounted() {
    this.fetchList()
  },
  methods:{
    // step一覧の情報を取得
    fetchList(){
      const url = '/api/step/mypage_challenge';
      axios.get(url).then(response => { 
        this.challengeSteps = response.data
        console.log('this.steps :', this.challengeSteps);
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