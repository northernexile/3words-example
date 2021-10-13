require('./bootstrap');

window.vue = require('vue');
import App from './App.vue';
import router from "./router.js";

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
});
