require('./bootstrap');

window.Vue = require('vue').default;

import Vuetify from 'vuetify'
Vue.use(Vuetify);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

//Vue.component('alert-component', require('./components/AlertComponent.vue').default);

//Vue.component('menu-component', require('./components/MenuComponent.vue').default);



const app = new Vue({
    el: '#app',
    vuetify: new Vuetify({
        theme: { light: true },
    }),
});
