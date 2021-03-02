import { createApp, defineComponent } from 'vue';

//import App from './components/App';
//import AppComponent from './components/App';
import Teste from './components/teste.js';
console.log('App.ts --> ', Teste);
createApp(defineComponent({}));
var Foo = { template: '<div>foo</div>' };
var Bar = { template: '<div>bar</div>' };
var router = new VueRouter({
    mode: 'history',
    base: '/',
    routes: [
        { path: '/foo', component: Foo },
        { path: '/bar', component: Bar }
    ]
});
//.use(router).mount('#app')
//# sourceMappingURL=app.js.map
