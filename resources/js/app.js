
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import HomeComponent from './components/HomeComponent.vue';
import CreateItemComponent from './components/CreateItemComponent.vue';
import EditItemComponent from './components/EditItemComponent.vue';

const routes = [
  {
      name: 'product',
      path: '/product',
      component: HomeComponent
  },
  {
      name: 'create',
      path: '/product/create',
      component: CreateItemComponent
  },
  {
      name: 'edit',
      path: '/product/:id',
      component: EditItemComponent
  }
];

const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
