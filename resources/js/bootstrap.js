import axios from 'axios';
import Alpine from 'alpinejs';
import 'flowbite/dist/flowbite.min.js';
import Precognition from 'laravel-precognition-alpine';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
Alpine.plugin(Precognition);
Alpine.start();

window.Alpine = Alpine;
