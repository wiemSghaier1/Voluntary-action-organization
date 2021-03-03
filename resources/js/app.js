
//router.js
import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)


/*
import type from '../components/event.vue';
import bylocation from '../components/bylocation.vue';*/
import topp from './components/topp.vue';
import choise from './components/choise.vue';
import eventdetail from './components/eventdetail.vue';


const routes = [
  {path: '/poverty', component:topp ,name:'topp' },
  { path: '/choise', component:choise, name:'choise'},
  { path: '/events/:type', component:choise, name:'evpartype'}, 
  { path: '/event/:id', component:eventdetail, name:'eventdetail'}, 
  
  
/*{ path: '/header', component:header , name:'header'}*/
]

const router = new VueRouter({
    routes:routes,
    hashbang:false,
    mode: 'history',
  });
  
//app.js

require('./bootstrap');
window.Vue = require('vue');


Vue.component('Event', require('./components/Event.vue').default);
Vue.component('type', require('./components/type.vue').default);
Vue.component('topp', require('./components/topp.vue').default);
Vue.component('choise', require('./components/choise.vue').default);
Vue.component('eventdetail', require('./components/eventdetail.vue').default);
Vue.component('realized', require('./components/realized.vue').default);



//import router from './routes/routes.js';


window.onload = function () {
    var app = new Vue({
        el: '#app',
        router,
     
    });
}

