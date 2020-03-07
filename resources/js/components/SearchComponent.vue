<template>
  <div>
    <div class="c-search">
  <div class="c-search__box">
    <input type="text" class="c-search__input" placeholder="カテゴリ名" name="search" v-model="filterQuery">
  </div>
  <button type="button" @click="onClickSearch">検索</button>
</div>
  </div>
</template>

<script>
export default {
  data: function(){
    return {
      filterQuery: ''
    }
  },
  mounted() {
    this.fetchList()
  },
  methods:{
    // step一覧の情報を取得
    fetchList(){
      const url = '/api/home/';
      if(this.filterQuery){
        let parm = '?search=' + this.filterQuery;
      }
      axios.get(url + parm).then(response => { 
        this.challengeSteps = response.data
        console.log('this.steps :', this.challengeSteps);
      }).catch(error => console.log(error, 'エラー'))
    },
    onClickSearch() {
      this.fetchList()
    },
  }
}
</script>