require('./bootstrap')
window.Vue = require('vue')
window.events = new Vue();

import VueProgressBar from 'vue-progressbar'
import Book from './components/Book'
import VModal from 'vue-js-modal'

Vue.component('vue-skeleton', require('./components/Vue-Skeleton').default)
Vue.component('message-box', require('./components/MessageBox').default)

console.log('%cPlease do not hesitate to send us your suggestions!', 'color:#5658d6;')

Vue.use(VModal, {componentName: 'modal'})

const vpbOptions = {color: '#5658d6', failedColor: '#757575', thickness: '3px', transition: {speed: '0.1s', opacity: '0.6s', termination: 300}, autoRevert: true, location: 'top', inverse: false}
Vue.use(VueProgressBar, vpbOptions)

window.messageBox = function (message, level='success') {
    window.events.$emit('message-box', message, level)
}

new Vue({
    el: '#app',
    components: {Book}
})