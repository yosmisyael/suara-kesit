import axios from 'axios';
import Alpine from 'alpinejs';
import 'flowbite/dist/flowbite.min.js';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Alpine.start();

window.Alpine = Alpine;
