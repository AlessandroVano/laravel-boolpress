<template>
    <section class="container">
        <h1 class="mb-5">Contacy us</h1>

        <div class="row">
            <div class="col-md-6">
                <h4>Boolpress</h4>
                <div>lorem ipsum street, 99</div>
                <div>Ipsum, It</div>
            </div>
            <div class="col-md-6">
                <div v-show="success" class="alert alert-success">
                    Message sent successfully
                </div>
                <h2 class="mb-4">
                    Get in touch with the form below

                    <form @submit.prevent="postForm">
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input class="form-control" type="text" id="name" v-model="name"> <!-- v-model attacco il valore dell'imput alla variabile nel return, in questo abbiamo già le variabili pronte da inviare al server -->
                            <div v-for="(error, index) in errors.name"
                                  :key= "`err-name-${index}`" 
                                   class="text-danger"
                                   >  <!-- sono proprietà dell'oggetto quindi devo concatere l'id -->
                                     {{ error }}
                            </div>
                        </div>
                         <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="text" id="email" v-model="email"> 
                            <div v-for="(error, index) in errors.email"
                                  :key= "`err-email-${index}`"
                                   class="text-danger"
                                   >  <!-- sono proprietà dell'oggetto quindi devo concatere l'id -->
                                     {{ error }}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="message">message</label>
                            <textarea class="form-control" id="message" rows="5" v-model="message"></textarea>
                            <div v-for="(error, index) in errors.message"
                                  :key= "`err-message-${index}`"
                                   class="text-danger"
                                   >  <!-- sono proprietà dell'oggetto quindi devo concatere l'id -->
                                     {{ error }}
                            </div>
                        </div>
                                 
                        <button type="submit" class="btn btn-primary" :disabled="sending" >
                             {{ sending ? 'Sending...'  : 'Send' }}
                          
                        </button>
                    </form>
                </h2>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
export default {
    name: "Contact",
    data() {
        return {
            name: '',
            email: '',
            message: '',
            errors: {},
            success: false,
            sending: false,
        };
    },
    methods: {
        postForm() {
          /*   console.log("Send form data"); */
             
             /* DISABILITO IL BOTTONE DURANTE LA CHIAMATA AXIOS */
             this.sending = true;


           axios.post /* preso dalla roote di api.php */ ('http://127.0.0.1:8000/api/contacts',{
               name: this.name,
               email: this.email,
               message: this.message,

           })
           .then(res => {
               console.log(res.data);
                this.sendig = false;
               /* dopo aver messo la validazione nel contactController */
               if(res.data.errors) {
                this.errors = res.data.errors;
                  /* gli metto la classe successe false se prova a rinviare subito una seconda form così la classe success sparisce */
                  this.success = false;
               } else {
                 /* se è andato tutto a buon fine qui puliamo i campi al click del bottone */
                 this.name = '';
                  this.email = '';
                   this.message = '';

                   /* pulizia errori fatti in precedenza  */
                   this.errors = {};
                   /* gli metto la classe successe */
                   this.success = true;
               }
           })
           .catch(err => console.log(err));
        }
    }
};
</script>

<style></style>
