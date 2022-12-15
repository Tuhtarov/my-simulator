import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});
import store from '@/store/store.js'

Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
    app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
});

app.mount('#app');
app.use(store)
