/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

import laravelvue from './components/laravelvue.vue';
app.component('laravelvue', laravelvue);
// Vue.component('pagination', require('laravel-vue-pagination'));
// import pagination from 'laravel-vue-pagination';
// app.component('laravel-vue-pagination', pagination)


app.mount('#app');
