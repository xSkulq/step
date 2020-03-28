<template>
  <div class="p-step_challenge__box">
    <div>
      <div class="p-step_challenge__card" v-for="(step, index) in challengeSteps" :key="index">
        <div class="p-step_challenge__thead">
          <!--<img :src="'data:image/png;base64,' + step.pic" alt="アイコン" class="p-step_challenge__thead__img" v-if="step.pic">-->
          <!--<img src="/imges/no_image.png" alt="アイコン" class="p-step_challenge__thead__img" v-else>-->
          <!--<a :href="'/step/ditail/'+ step.id" class="p-step_challenge__thead__button" v-if="step.step_children.length == step.clears.length">続きから</a>-->
          <!--<a :href="'/step/child/ditail/'+ step.step_children[0].id" class="p-step_challenge__thead__button" v-else-if="step.clears.length == 0">続きから</a>-->
          <!--<a :href="'/step/child/ditail/'+ nextChild(step)" class="p-step_challenge__thead__button" v-else>続きから</a>-->
          
          <!-- チャレンジを全部クリアしたとき -->
          <a :href="'/step/ditail/'+ step.id" v-if="step.step_children.length == step.clears.length">
          <img :src="'data:image/png;base64,' + step.pic" alt="アイコン" class="p-step_challenge__thead__img" v-if="step.pic">
          <img src="/imges/no_image.png" alt="アイコン" class="p-step_challenge__thead__img" v-else>
          <a class="p-step_challenge__thead__button">続きから</a>
          </a>

          <!-- チャレンジを１つもクリアしていないとき --> 
          <a :href="'/step/child/ditail/'+ step.step_children[0].id" v-else-if="step.clears.length == 0">
          <img :src="'data:image/png;base64,' + step.pic" alt="アイコン" class="p-step_challenge__thead__img" v-if="step.pic">
          <img src="/imges/no_image.png" alt="アイコン" class="p-step_challenge__thead__img" v-else>
          <a class="p-step_challenge__thead__button">続きから</a>
          </a>

          <!-- チャレンジを１つでもクリアしたとき -->
          <a :href="'/step/child/ditail/'+ nextChild(step)" v-else>
          <img :src="'data:image/png;base64,' + step.pic" alt="アイコン" class="p-step_challenge__thead__img" v-if="step.pic">
          <img src="/imges/no_image.png" alt="アイコン" class="p-step_challenge__thead__img" v-else>
          <a class="p-step_challenge__thead__button">続きから</a>
          </a>

        </div>
        <div class="p-step_challenge__tbody">
        <a :href="'/step/ditail/' + step.id" class="p-step_challenge__tbody__link">
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
              <p class="u-ml10" v-if="step.user.name == null"></p>
              <p class="u-ml10" v-else>{{ step.user.name }}</p>
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
    <!-- ページネーション -->
    <div v-if="paginate.total > 8">
    <pagination-component :data="paginate" @move-page="movePage($event)"></pagination-component>
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
      let param = '';
      if (this.search !== '' && this.category !== '') { // searchとcategoryに値がある場合
        param += '?search=' + this.search + '&category_id=' + this.category + '&page=' + this.page
      }else if(this.search !== '' && this.category === ''){ // searchだけ値がある場合
        param += '?search=' + this.search + '&category_id=' + '&page=' + this.page
      }else if(this.search === '' && this.category !== ''){ // categoryだけ値がある場合
        param += '?search=' + '&category_id=' + this.category + '&page=' + this.page
      }else{ // 何も値がない場合
        param = '?page=' + this.page;
      }
      axios.get(url + param).then(response => { 
        this.challengeSteps = response.data.data
        this.paginate = response.data
      })
    },
    formatDate: function(date){
      // 日付をYYYY/MM/DD
      if(!date) return '-';
      return moment(date).format('YYYY/MM/DD');
    },
    // 次の子STEPのidを取得する処理
    nextChild: function(step){
      let lastClear = step.clears.slice(-1)[0];
      let totalChild = step.step_children.length;
      let clearChildKey = '';
      let nextChildId = '';

      step.step_children.forEach((value, key) => {
        if(lastClear != null && lastClear['step_child_id'] == value.id){
          clearChildKey = key;
        }
      });
      if(clearChildKey != null && (clearChildKey+1) < totalChild){
        let nextChildId = step.step_children[(clearChildKey+1)].id;
        step['next_child'] = nextChildId
      }
      return step['next_child'];
    },
    movePage(page) {
      this.page = page
      this.fetchList()
      scrollTo(0, 0);
    },
    userClear: function(clear){
      let count = '';
    }
  }
}
</script>