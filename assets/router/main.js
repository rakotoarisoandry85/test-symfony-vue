import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home'
import Login from '../views/Login'
import Register from '../views/Register'
//import store from '../store/main'


Vue.use(VueRouter)

const routes = [
  {
    path: '/home',
    name: 'home',
    component: Home
  },
  {
    path: '/login',
    name: 'login',
    component: Login
  },
  {
    path: '/register',
    name: 'register',
    component: Register
  }
 

]

//console.log(process.env.BASE_URL)
//process.env.BASE_URL
const router = new VueRouter({
  mode: 'history',
  base: '/',
  routes
})

export default router