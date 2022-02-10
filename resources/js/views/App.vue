<template>
    <div>
         <Header />

           <main> <!-- prende il componente home e lo mette dentro qui -->
             <router-view></router-view>
           </main>
    </div>
</template>

<script>
import Header from '../components/Header.vue';

export default {
  name: 'App',
  components: {
   Header,
  },
}
</script>

<style lang="scss">

  
 

</style>