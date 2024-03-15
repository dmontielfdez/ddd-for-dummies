import './bootstrap';
import * as bootstrap from 'bootstrap';
import {createApp, h} from 'vue'
import {createInertiaApp} from '@inertiajs/vue3'


window.bootstrap = bootstrap;


createInertiaApp({
    title: title => `${title} - DDD for dummies`,
    resolve: name => {
        const pages = import.meta.glob('./pages/**/*.vue', {eager: true})
        return pages[`./pages/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        const app = createApp({render: () => h(App, props)})
            .use(plugin);

        app.config.globalProperties.$route = route;
        app.mount(el);
    },
})



