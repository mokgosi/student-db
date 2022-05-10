require('./bootstrap');

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import router from './router';
import StudentsIndex from './components/students/StudentsIndex';

createApp({
    components: {
        StudentsIndex,
    }
}).use(router).mount('#app');

window.Alpine = Alpine;

Alpine.start();
