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

InitCarousels();
InitClientGallery();
InitModals();
InitDetails();
InitToggleMenu();
initToggleVideo();

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

if (document.getElementById('user-button-app')) {
    new Vue({
        i18n,
        components: {
            UserButton,
        },
    }).$mount('#user-button-app');
}
