/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
//import './styles/app.css';
import './styles/chat.css'
// assets/app.js 
import { createApp } from 'vue';
//import App from './js/App.vue';

import Vue from 'vue'
import App from './components/App'
import router from './router/main'
import store from './store/main'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import axios from 'axios'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue,IconsPlugin)  

Vue.config.productionTip = false
axios.defaults.baseURL = 'http://localhost:8000/api'
require('./store/subscriber')

store.dispatch('auth/attempt', localStorage.getItem('token')).then(()=>{
  new Vue({
    router,
    store,
    render: h => h(App)
  }).$mount('#root')
})

//createApp(App).mount('#vue-app');
//createApp(App).mount('#root');