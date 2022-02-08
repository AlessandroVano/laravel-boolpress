<template>
  <div class="container">
      <h1>Questo è il blog</h1>
   <!-- 7) gli diamo la schermata di caricamento se non trova i post o è lento il sistema a caricare -->
      <div v-if="posts">
        <!-- 8) stampaggio post -->
        <article class="mb-4" v-for="post in posts" :key="`post-${ post.id }`"> <!-- la key da ci da i riferimenti se si va a modificare qualcosa nel database del post -->
             <h2>{{ post.title }}</h2>
             <!-- 12) ritorniamo la funzione delle date -->
             <div class="mb-4">{{ formatDate(post.created_at) }}</div>
             <!-- 10) richiamo la funzione dei caratteri e gli do il massimo di 100 caratteri superati quelli con la funzione sotto mi metterà i puntini quando supero i 100 -->
             <p>{{  getExcerpt(post.body, 100)  }}</p>
        </article>
        
        <!-- PAGINAZIONE -->
        <section>
         <button
          class="btn btn-primary mr-3"
          :disabled="pagination.current === 1"
         @click="getPosts(pagination.current - 1)"
         >
           avanti
         </button>

         <button
           v-for="i in pagination.last"
           :key="`page-${i}`"
           @click="getPosts(i)"
           class="btn mr-3"
           :class="pagination.current === i ? 'btn-primary' : 'btn-secondary'"
         >
             {{ i }} 
         </button>


         <button
         class="btn btn-primary"
          :disabled="pagination.current === pagination.last"
         @click="getPosts(pagination.current + 1)"
         >
           indietro
         </button>

        </section>
      </div>
        
        <Loader v-else />
      <!-- <div v-else>
       Loading posts...
      </div> -->
  </div>
</template>

<script>
// 1) importiamo axios
import axios from 'axios';
import Loader from '../components/Loader.vue';

export default {
  name: 'App',
  components: {
    Loader,
  },
  // 2 mettiamo il data
  data() {
    return {
      posts: null,        /* questo ci darà gli oggetti che ritorniamo da postman */
      pagination: null, 

    }
  },
  // 3) al caricamento della pagina front end andiamo a pescare i dati
    created() {
     /*  console.log('Get posts from api'); */
     // 5) richiamo il metod
     this.getPosts();
    },
     // 4 aggiungiamo il metodino
    methods: {
      getPosts(page = 1) {
      /*   console.log('chiamata axios'); */

      // 6) effetuare chiamata axios
      axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
      .then(res => {
             console.log(res);

             // A. dati non impaginato (si trovano solo in console)
              // qui si trova il dato effettivo

            /*  this.posts = res.data.data; */


                // B. dati impaginato
               this.posts = res.data.data;
               // C. paginazioni
               this.pagination = {
                 current: res.data.current_page,
                 last: res.data.last_page
               }
      });

      },
      // 9) funzione x troncare i caratteri se raggiungono il massimo consentito
      getExcerpt(text, maxLength) {
        if(text.length > maxLength) {
          return text.substring(0, maxLength) + '...'; // text (prendo sottostringa)
        }
        // se sono sotto alla lunghezza consentita
        return text;
      },
      // 11 funzione per formattare le date
      // A) formatted: vado a dargli una data formattata
      // b) gli passo la lingua
      // c) creazione istanza con metodo format e gli diamo dentro il date
      // d) ritorniamo il formatted
      formatDate(postDate) {
        /*   console.log(postDate); */
         const date = new Date(postDate);
         /* console.log(date);  */
          
          const formatted = new Intl.DateTimeFormat('it-IT').format(date)
           return formatted;
      }
    }
}
</script>

<style lang="scss">

   div {
       h1 {
           margin-top: 80px;
            text-align: center;
       }
   }

</style>