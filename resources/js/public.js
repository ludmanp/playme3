/**
 * jQuery
 */
import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

import "slick-carousel";
import 'owl.carousel';

import {InitCarousels} from './public/carousels';
import {InitClientGallery} from './public/clientGallery';
import {InitModals} from './public/modal';
import { InitDetails } from './public/details';
import { InitToggleMenu } from './public/toggleMenu';
import { initToggleVideo } from './public/toggleVideo';
import { InitCopy } from './public/copy';
import {InitMainVideo} from "./public/mainVideo";
import {InitToggleNavLink} from "./public/toggleNavLink";

InitCarousels();
InitClientGallery();
InitModals();
InitDetails();
InitToggleMenu();
initToggleVideo();
InitCopy();
InitMainVideo();
InitToggleNavLink();

/**
 * Axios HTTP library
 */
import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Vue
 */
import Vue from 'vue';

window.Vue = Vue;

window.EventBus = new Vue({});

/**
 * i18n
 */
import VueI18n from 'vue-i18n';
import ru from '../../lang/ru.json';
import en from '../../lang/en.json';
const messages = { ru, en };
const i18n = new VueI18n({ locale: window.TypiCMS.locale, messages });

import UserButton from "./public/components/UserButton";
import BroadcastForm from "./public/components/BroadcastForm";
import ShootingForm from "./public/components/ShootingForm.vue";

if (document.getElementById('user-button-app')) {
    new Vue({
        i18n,
        components: {
            UserButton,
        },
    }).$mount('#user-button-app');
}

if (document.getElementById('mobile-user-button-app')) {
    new Vue({
        i18n,
        components: {
            UserButton,
        },
    }).$mount('#mobile-user-button-app');
}

if (document.getElementById('broadcast-form-app')) {
    new Vue({
        i18n,
        components: {
            BroadcastForm,
        },
    }).$mount('#broadcast-form-app');
}

if (document.getElementById('shooting-form-app')) {
    new Vue({
        i18n,
        components: {
            ShootingForm,
        },
    }).$mount('#shooting-form-app');
}
