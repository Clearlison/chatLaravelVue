/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import store from './store/store'

Vue.component('chat', require('./components/chat/Chat.vue').default);
Vue.component('users', require('./components/chat/Users.vue').default);
Vue.component('messages', require('./components/chat/Messages.vue').default);
Vue.component('message', require('./components/chat/Message.vue').default);

const app = new Vue({
    store,
    el: '#app',
});
