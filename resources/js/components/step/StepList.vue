<template>
<div>
  <div class="p-step_list__list-box">
    <a :href="'/step/ditail/' + step.id" class="p-step_list__card" v-for="(step, index) in steps" :key="index">
      <div>
        <div class="p-step_list__thead">
          <img :src="'data:image/png;base64,' + step.pic" alt="STEP画像TOP" class="p-step_list__img" v-if="step.pic">
          <img src="/imges/no_image.png" alt="STEP画像TOP" class="p-step_list__img" v-else>
        </div>
        <div class="p-step_list__tbody">
          <div class="p-step_list__top">
            <p>{{ formatDate(step.created_at) }}</p>
            <div class="u-flex">
              <div class="u-flex">
                <i class="fas fa-inbox"></i>
                <p class="u-ml5">{{ step.category.name }}</p>
              </div>
              <div class="u-flex u-ml10">
                <i class="fas fa-hourglass-end"></i>
                <p class="u-ml5">{{ (step.total_time) }}</p>
              </div>
            </div>
          </div>
          <div class="p-step_list__medium">
            <p class="u-mb5">STEP</p>
            <p class="p-step_list__medium__font">{{ step.title}}</p>
          </div>
          <div class="p-step_list__bottom">
          <img :src="'data:image/png;base64,' + step.user.pic" alt="アイコン" class="p-step_list__icon" v-if="step.user.pic">
            <img src="/imges/no_image.png" alt="アイコン" class="p-step_list__icon" v-else>
            <p class="u-ml10" v-if="step.user.name == null"></p>
            <p class="u-ml10" v-else>{{ step.user.name }}</p>
          </div>
        </div>
      </div>
    </a>
  </div>
  <!-- ページネーション -->
  <div v-if="paginate.total > 12">
  <pagination-component :data="paginate" @move-page="movePage($event)"></pagination-component>
  </div>
</div>
</template>
<script>
export default {
	props: ['search','category'],
  data: function(){
    return {
      steps: {},
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
      const url = 'api/home';
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
        this.steps = response.data.data
        this.paginate = response.data
      })
    },
    formatDate: function(date){
      // 日付をYYYY/MM/DD
      if(!date) return '-';
      return moment(date).format('YYYY/MM/DD');
    },
    movePage(page) {
      this.page = page
      this.fetchList()
      scrollTo(0, 0);
    },
  }
}
</script>