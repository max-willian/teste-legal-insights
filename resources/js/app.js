require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import {routes} from "./routes";
import MainApp  from './components/MainApp';

Vue.use(VueRouter);
const router = new VueRouter({
    routes,
    mode: 'history'
});

const app = new Vue({
    el: '#app',
    router: router,
    components: {
        MainApp
    }
});

