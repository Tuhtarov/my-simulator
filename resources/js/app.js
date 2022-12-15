import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});
import store from '@/store/store.js'
app.use(store)

Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
    app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
});

app.mount('#app');
