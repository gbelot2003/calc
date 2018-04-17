/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');


import Vuetify from 'vuetify';
import colors from 'vuetify/es5/util/colors'

const green2 = Object.freeze({
    base: '#2A5319',
    lighten5: '#e8f5e9',
    lighten4: '#c8e6c9',
    lighten3: '#a5d6a7',
    lighten2: '#81c784',
    lighten1: '#66bb6a',
    darken1: '#43a047',
    darken2: '#388e3c',
    darken3: '#2e7d32',
    darken4: '#1b5e20',
    accent1: '#b9f6ca',
    accent2: '#69f0ae',
    accent3: '#00e676',
    accent4: '#00c853'
})

Vue.use(Vuetify, {
    theme: {
        primary: green2.base,
        secondary: green2.base,
        accent: colors.cyan.accent4,
        error: colors.red.base,
        warning: colors.lime.darken2,
        info: colors.teal.darken2,
        success: green2.base
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
