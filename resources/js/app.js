import {vfmPlugin} from 'vue-final-modal'
import {createApp} from 'vue';
import vuex from '@/store/store.js'
import App from '@/App.vue';

const app = createApp({});

app.use(vuex)

// vue modal
app.use(vfmPlugin({
    key: '$vfm',
    componentName: 'VueFinalModal',
    dynamicContainerName: 'ModalsContainer'
}))

app.component('app', App)

app.mount('#app');
