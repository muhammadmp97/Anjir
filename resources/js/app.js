require('./bootstrap');
window.Vue = require('vue');

import VueProgressBar from 'vue-progressbar';
import Book from './components/Book';

console.log('%cPlease do not hesitate to send us your suggestions!', 'color:#5658d6;');

const vpbOptions = {color: '#5658d6', failedColor: '#757575', thickness: '3px', transition: {speed: '0.1s', opacity: '0.6s', termination: 300}, autoRevert: true, location: 'top', inverse: false};
Vue.use(VueProgressBar, vpbOptions);

new Vue({
    el: '#app',
    components: {Book}
});