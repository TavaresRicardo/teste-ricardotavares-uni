
import './bootstrap';
import Vue from 'vue';
import App from './components/TemplateHomeVue';
import Router from './routes';

// import NavBarVue from './components/NavBarVue';
// import FooterVue from './components/FooterVue';
// import GridVue from './components/GridVue';
// import CardMenuVue from './components/CardMenuVue';


const app = new Vue({
    el: '#app',
    router: Router,
    render: h => h(App),
});

export default app;

