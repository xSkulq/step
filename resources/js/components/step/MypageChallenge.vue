<template>
  <div>
    <div class="p-step_challenge__card" v-for="(step, index) in challengeSteps" :key="index">
      <div class="p-step_challenge__thead">
        <img :src="'data:image/png;base64,' + step.pic" alt="アイコン" class="p-step_challenge__thead__img" v-if="step.pic">
        <img src="/imges/no_image.png" alt="アイコン" class="p-step_challenge__thead__img">
        <a :href="'/step/child/ditail/'" class="p-step_challenge__thead__button">続きから</a>
      </div>
      <div class="p-step_challenge__tbody">
      <a :href="'/step/ditail/' + step.id">
        <div class="p-step_challenge__top">
          <p class="u-mb5">STEPタイトル</p>
          <p class="p-step_challenge__top__font">{{ step.title }}</p>
        </div>
        <div class="p-step_challenge__medium">
          <p class="p-step_challenge__medium__font">{{ step.clears.length}}/{{ step.step_children.length}}<span class="u-ml5">STEP</span></p>
          <!-- プログレスバー -->
          <div class="c-progress">
            <div class="c-progress__bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" :style="'width:' + Math.floor(step.clears.length / step.step_children.length * 100) + '%'">
              <span>{{ Math.floor(step.clears.length / step.step_children.length * 100) }}%</span>
            </div>
          </div>
        </div>
        <div class="p-step_challenge__bottom">
          <div class="p-step_challenge__bottom__prof">
            <img src="/imges/no_image.png" alt="アイコン" class="p-step_mypage__icon">
            <p class="u-ml5">{{ step.user.name}}</p>
          </div>
          <div class="u-flex">
            <div class="u-flex">
              <i class="fas fa-inbox"></i>
              <p class="u-ml5">{{ step.category.name }}</p>
            </div>
            <div class="u-flex u-ml10">
              <i class="fas fa-hourglass-end"></i>
              <p class="u-ml5">{{ step.total_time }}</p>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['search','category'],
  computed:{
  },
  data: function(){
    return {
      challengeSteps: {},
      paginate: {},
      page: 1,
    }
  },
  mounted() {
    this.fetchList()
  },
  methods:{
    // step一覧の情報を取得
    fetchList(){
      const url = '/api/step/mypage_challenge';
      let param = '?page=' + this.page;
      if (this.search !== '' && this.category !== '') { // searchとcategoryに値がある場合
        console.log('search :', this.search)
        param += '?search=' + this.search + '&category_id=' + this.category
      }else if(this.search !== '' && this.category === ''){ // searchだけ値がある場合
        param += '?search=' + this.search + '&category_id='
      }else if(this.search === '' && this.category !== ''){ // categoryだけ値がある場合
        param += '?search=' + '&category_id=' + this.category
      }else{ // 何も値がない場合
        param = ''
      }
      axios.get(url + param).then(response => { 
        this.challengeSteps = response.data.data
        this.paginate = response.data
        console.log('this.steps :', this.challengeSteps);
      }).catch(error => console.log(error, 'エラー'))
    },
    formatDate: function(date){
      // 日付をYYYY/MM/DD
      if(!date) return '-';
      return moment(date).format('YYYY/MM/DD');
    },
    /*nextChild: function(step){
      let lastClear = step.clears.slice(-1)[0];
      console.log(lastClear,'lastClear');
      let totalChild = step.step_children.length;
      console.log(totalChild,'totalChild');
      let clearChildKey = '';
      let nextChildId = '';

      step.step_children.forEach((value, key) => {
        console.log('forech')
        if(lastClear != null && lastClear['step_child_id'] < value.id){
          let clearChildKey = key;
          //console.log((clearChildKey+1),'key');
          //console.log('if文');
        }
      });
      //console.log(clearChildKey);
      if(clearChildKey != null && (clearChildKey+1) < totalChild){
        console.log('if文')
        let nextChildId = step.step_children[(clearChildKey+1)].id;
        console.log(nextChildId,'nextChildId');
      }else{
        console.log('else');
      }
      return nextChildId;
    }*/
  }
}
</script>