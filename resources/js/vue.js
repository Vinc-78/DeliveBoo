window.Vue = require('vue');

/* Vue.component('example-component', require('./components/ExampleComponent.vue').default); */


import App from './components/App.vue'
import router from "./router.js";


const app = new Vue({
    el: '#root',

    router,
    
    render: h =>h(App)
});
