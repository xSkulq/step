<template>
<div>
  <div class="c-pagination" v-if="Object.keys(data).length">
    <ul class="c-pagination__block">

      <!-- firstボタン -->
      <li>
        <a href="" @click.prevent="move(1)" :class="getPrevClass">
          <i class="fas fa-angle-double-left"></i>
        </a>
      </li>

      <!-- prevボタン -->
      <li>
        <a href="" @click.prevent="move(data.current_page-1)" :class="getPrevClass">
          <i class="fas fa-angle-left"></i>
        </a>
      </li>

      <!-- ページボタン -->
      <li :class="getPageClassLi(page)" v-for="(page, index) in pages" :key="index">
        <a :class="getPageClassA(page)" href="" @click.prevent="move(page)" v-text="page"></a>
      </li>

      <!-- nextボタン -->
      <li>
        <a href="" @click.prevent="move(data.current_page+1)" :class="getNextClass">
          <i class="fas fa-angle-right"></i>
        </a>
      </li>
          
      <!-- lastボタン -->
      <li>
        <a href="" @click.prevent="move(data.last_page)" :class="getNextClass">
          <i class="fas fa-angle-double-right"></i>
        </a>
      </li>
    </ul>
  </div>
  <div v-else></div>
</div>



</template>

<script>
  const MAX_SHOW_PAGE = 5

  export default {
    props: {
      data: {
        required: false
      },
    },
    data: function () {
      return {
        totalPage: 0,
        currentPage: 0,
      }
    },
    mounted() {
    },
    methods: {
      move(page) { // 各ボタン押下時、親側に処理を通知する
        if(this.data.current_page != page) {
          this.$emit('move-page', page)
        }
      },
      getPageClassLi(page) { // 現在のページ番号にactiveをつける
        let classes = ['c-pagination__number-block'];

        if(this.data.current_page == page) {
          classes.push('c-pagination__number-block__current');
        }
        return classes;
      },
      getPageClassA(page) { // 現在のページ番号にactiveをつける
        let classes = ['c-pagination__number-font'];

        if(this.data.current_page == page) {
          classes.push('c-pagination__number-font__current');
        }
        return classes;
      }
    },
    computed: {
      getPrevClass() { // prevボタンの有効無効設定
        let classes = ["c-pagination__icon"];

        if(this.data.prev_page_url == null) {
          classes.push('c-pagination__icon-invalid');
        }
        return classes;
      },
      getNextClass() { // nextボタンの表示、非表示
        let classes = ["c-pagination__icon"];

        if(this.data.next_page_url == null) {
          classes.push('c-pagination__icon-invalid');
        }
        return classes;
      },
      pages() { // 表示するpage番号を取得
        let pages = [];

        if(this.data.last_page <= MAX_SHOW_PAGE) {
          for(let i = 1 ; i <= this.data.last_page ; i++) {
            pages.push(i)
          }
        }else if(this.data.current_page == 1 || this.data.current_page == 2 ) {
            for(let i = 1 ; i <= MAX_SHOW_PAGE ; i++) {
              pages.push(i)
            }
        }else if(this.data.current_page >= (this.data.last_page - 1)) {
          let cnt = this.data.last_page - MAX_SHOW_PAGE

          for(let i = 0 ; i < MAX_SHOW_PAGE ; i++) {
            cnt++
            pages.push(cnt)
          }
        }else{
          let cnt = this.data.current_page - 3

          for(let i = 0 ; i < MAX_SHOW_PAGE ; i++) {
            cnt++
            pages.push(cnt)
          }
        }
        return pages;
      }
   },
  }
</script>
