import App from "./components/App";
import Ionic from '@ionic/vue';
import '@ionic/core/css/ionic.bundle.css';
import { addIcons } from 'ionicons';
import * as allIcons from 'ionicons/icons';
import 'dropzone/dist/dropzone';
import 'dropzone/dist/dropzone.css';

require('./bootstrap');

window.Vue = require('vue');
var IonicVueRouter = require('vue-router').default;

const currentIcons = Object.keys(allIcons).map(i => {
    return {
        ['ios-' + i]: allIcons[i].ios,
        ['md-' + i]: allIcons[i].md
    };
});
const iconsObject = Object.assign({}, ...currentIcons);
addIcons(iconsObject);

Vue.use(IonicVueRouter);
Vue.use(Ionic);

const router = new IonicVueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: () => import('./components/Home')
        },
        {
            path: '/files',
            name: 'files',
            component: () => import('./components/Files'),
            props:true
        },
        {
            path: '/login',
            component: () => import('./components/Login')
        },
        {
            path: '/register',
            component: () => import('./components/Register')
        }
    ]
});

new Vue({
    render: h => h(App),
    router,
}).$mount('#app');
