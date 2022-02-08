/* console.log('FRONT OFFICE'); */

/* IMPORTAZIONE DI VUE */
import Vue from 'vue';

/* IMPORTARE APP.VUE */

import App from './views/App.vue';


// QUI METTIAMO L'ISTANZA DI VUE

const root = new Vue({
    el: '#root', // nodo che usciamo per interagire (riga 14 file home blade.php in cartella guests)
    render: h => h(App) // Mostriamo app all'avvio di Vue
    //render dice non guardare all'interno ma reindirizzaci tu qualcosa (tutte le cose che avremmo dentro verrano mostrate)
    /* h => h(app) funzione che serve x prendere il componente app e stamparla direttamente nel componente home.blade */
})