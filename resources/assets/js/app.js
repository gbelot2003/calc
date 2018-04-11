/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');


import Vuetify from 'vuetify';
import colors from 'vuetify/es5/util/colors'
Vue.use(Vuetify, {
    theme: {
        primary: colors.cyan.darken4,
        secondary: colors.cyan.darken3,
        accent: colors.cyan.accent4,
        error: colors.red.base,
        warning: colors.lime.darken2,
        info: colors.teal.darken2,
        success: colors.green.base
    }
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('v-select', vSelect);
Vue.component('calculadora', require('./components/Calculadora/Calculadora.vue'));


//Vue.use(VueMask);

const app = new Vue({
    el: '#app'
});
