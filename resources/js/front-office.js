/* console.log('FRONT OFFICE'); */

/* IMPORTAZIONE DI VUE */
import Vue from 'vue';

/* IMPORTARE APP.VUE */

import App from './views/App.vue';


// QUI METTIAMO L'ISTANZA DI VUE

const root = new Vue({
    el: '#root',
    render: h => h(App) // Mostriamo app all'avvio di Vue
})