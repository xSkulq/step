import Vue from 'vue'
import moment from "moment";

Vue.component('mypage-register', {
  template: `
  <div>
    <template><!-- v-for="step in steps" :key="step.id" -->
      <div class="p-step_mypage__item" v-for="(step, index) in steps" :key="index">
      <div class="p-step_mypage__top">
        <div class="u-flex">
          <img src="" alt="アイコン" class="p-step_mypage__img">
          <p class="p-step_mypage__name">紗倉あんこ</p>
        </div>
        <div>
          <p class="p-step_mypage__day">{{formatDate(step.created_at)}}</p>
          <p class="p-step_mypage__criterion">目安達成時間<span>{{step.achievement_time}}</span></p>
        </div>
      </div>
      <div class="p-step_mypage__medium">
        <a :href="'/step/ditail/' + step.id" class="p-step_mypage__medium-font">STEP<span>{{step.title}}</span></a><!-- TODO: クラス名いいの思いついたら変える -->
      </div>
      <div class="p-step_mypage__bottom">
        <div>
          <p class="p-step_mypage__bottom-font">{{step.category}}</p>
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
  </template>
  </div>
  `,
  props: {
    steps: Array
  },
  methods: {
    formatDate: function(date){
      // 日付をYYYY/MM/DD
      if(!date) return '-';
      return moment(date).format('YYYY/MM/DD');
    },
  }
})

var app = new Vue({
  el: '#app',
})