
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

require('./plugins/sweet-alert-plugin');

Vue.component('example', require('./components/Example.vue'));
Vue.component('heart', require('./components/Heart.vue'));
Vue.component('trash', require('./components/Trash.vue'));
Vue.component('follow', require('./components/Follow.vue'));
Vue.component('comment', require('./components/Comment.vue'));

const app = new Vue({
    el: '#app'
});
