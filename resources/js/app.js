/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import VueI18n from 'vue-i18n'

Vue.use(VueRouter);
Vue.use(VueI18n);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('load-list-component', require('./components/LoadsListComponent.vue').default);
Vue.component('locale-switcher', require('./components/LocaleSwitcher.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Routes
import { routes } from './router/routes';

//Register Routes
const router = new VueRouter({
    routes,
    mode: 'history',

});

// Ready translated locale messages
const messages = {
    en: {
        message: {
            name: 'Freight Exchange',
            loads_not_found: 'Loads not found'
        }
    },
    uk: {
        message: {
            name: 'Біржа вантажів',
            loads_not_found: 'Вантажів не знайдено'
        }
    }
};

router.beforeEach((to, from, next) => {
    const locale = to.params.locale;
    const supported_locales = process.env.MIX_APP_I18N_SUPPORTED_LOCALE.split(',');
    if (!locale || !supported_locales.includes(locale)){
        i18n.locale = process.env.MIX_APP_I18N_LOCALE
        return next();
    }

    if (i18n.locale !== locale) {
        i18n.locale = locale;
    }
    return next()
});

// Create VueI18n instance with options
const i18n = new VueI18n({
    locale: process.env.MIX_APP_I18N_LOCALE, // set locale
    fallbackLocale: process.env.MIX_APP_I18N_FALLBACK_LOCALE,
    messages, // set locale messages
});

const app = new Vue({
    el: '#app',
    i18n,
    router,
});
