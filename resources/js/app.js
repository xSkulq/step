/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')

// 画像プレビュー
window.preview = require('v-preview-input');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// step
Vue.component('step-list', require('./components/step/StepList.vue').default);
Vue.component('mypage-register', require('./components/step/MypageRegister.vue').default);
Vue.component('mypage-challenge', require('./components/step/MypageChallenge.vue').default);

// search
//ue.component('search-component', require('./components/SearchComponent.vue').default);

//preview
//step
Vue.component('step-img-preview', require('./components/step/ImgPreview.vue').default);
//account
Vue.component('account-img-preview', require('./components/account/ImgPreview.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#app'
})
