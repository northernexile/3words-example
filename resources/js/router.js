
import Vue from "vue";

import HomeComponent from './components/home/HomeComponent.vue';

import VueRouter from "vue-router";

Vue.use(VueRouter);

const router = new VueRouter({
    routes:[{
        path:'/',
        component:HomeComponent
    }]
})

export default router;
