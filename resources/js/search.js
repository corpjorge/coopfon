require('./bootstrap');

window.Vue = require('vue');

Vue.component('search-component', require('./components/search/searchComponent.vue').default);

const app = new Vue({
    el: '#search',
});
