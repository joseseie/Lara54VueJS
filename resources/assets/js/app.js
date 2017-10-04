
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('search', require('./components/Search.vue'));
Vue.component('init', require('./components/Init.vue'));
Vue.component('feed', require('./components/Feed.vue'));
Vue.component('post', require('./components/Post.vue'));
Vue.component('friend', require('./components/Friend.vue'));
Vue.component('unread', require('./components/UnreadNots.vue'));
Vue.component('notification', require('./components/Notification.vue'));
Vue.component('notify', require('./components/NotificateUpdate.vue'));

import { store } from './store'

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

const app = new Vue({
    el: '#app',
    store
});
