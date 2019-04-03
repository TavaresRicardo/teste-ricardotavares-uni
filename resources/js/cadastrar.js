
import './bootstrap';
import Vue from 'vue';
// import App from './components/TemplateHomeVue';
import App from './components/FormularioVue';
import Router from './routes';

// import NavBarVue from './components/NavBarVue';
// import FooterVue from './components/FooterVue';
// import GridVue from './components/GridVue';
// import CardMenuVue from './components/CardMenuVue';


const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: Router,
});

export default app;

