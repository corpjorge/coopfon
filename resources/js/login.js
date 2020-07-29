require('./bootstrap');

window.Vue = require('vue');

Vue.component('login-component', require('./components/login/loginComponent.vue').default);

const app = new Vue({
    el: '#login',
});
