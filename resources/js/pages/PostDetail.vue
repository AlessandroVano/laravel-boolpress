<template>
   <section class="container">
 
     <div v-if="post">
         <h1>{{ post.title }}</h1>

       <h4>Category: {{ post.category.name }}</h4> 

  
       <Tags  :list="post.tags" /> 

         <p>{{ post.body}}</p>

     </div>
    <Loader text="in attesa del post" v-else />

    <!--  <h1>ciao</h1> -->
   </section>
</template>

<script>
import axios from 'axios';
 import Tags from '../components/Tags'; 
import Loader from '../components/Loader';

export default {
name: 'PostDetail',
components: {
   Tags, 
  Loader,
},

data() {
    return {
        post: null
    }
 },
 created() {
    /*  console.log('API CALL SHOW DETAIL'); */
     this.getPostDetail();
 },
  methods: {
    getPostDetail() {
         // CHIAMATA POST TRAMITE API
         axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
         .then(res => {
             console.log(res.data);
             this.post = res.data;
              if(res.data.not_found) {
                 console.log('redirect 404');
                 this.$router.push({ name:'not-found' });
             } else {
                 this.post = res.data;
             }
             this.post = res.data; 
         })
         .catch(err => log.error(err));
    }
  }
}
</script>

<style>

</style>