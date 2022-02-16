<template>

    <div class="container">

    <div class="row justify-content-center mx-sm-5">
            <div class="col-sm-12 d-md-flex altezza">

                <div class="text-left d-sm-flex flex-sm-wrap flex-md-column align-items-start align-self-start mt-md-5 cartella">

                    <!--Stampa delle categorie  con check box-->
                    <label class="check" v-for="category in categoryList" :key="category.id">
                      <input  type="checkbox"
                            :value="category.name"
                            v-model="filtri"
                            @change="ricerca()"
                      >
                      <img :src="'/storage/img/category/' + category.img_category" alt="category.name">
                      <span class="nome-search">{{ category.name }}</span>
                    </label>
                </div>

                <!-- stampo i ristoranti appartenenti alla categoria selezionata dall'utente -->
                <div class="col-sm-12 col-md-10 d-flex flex-wrap align-items-start mt-md-5 mx-auto">

                    <div
                        v-for="user in usersList"
                        :key="user.id"
                        class="user"
                    >

                        <a href=""> <!-- '/show/' + users.id -->  <!-- Serve il router-link -->
                            <div class="image" >
                                <img class="img-fluid" :src="'storage/img/restaurant' + user.cover_img" alt="" >
                               
                            </div>
                            <div class="p-3 ">
                                <h4> <strong>  {{ user.name }}   </strong> </h4>
                                
                                <span> Indirizzo  {{user.address}} </span>  <br>
                                <span> Partita IVA: {{user.p_iva}}</span> 
                                
                            </div>
                        </a>

                    </div>

                </div>
            </div>
        </div>
        
        

    </div>
  
</template>

<script>
export default {
 name:"App",
    data() {
        return{
           
             usersList: [],
             categoryList: [],
        }
    },

    methods: {

        getUsers(){
                window.axios.get("/api/users").then((resp) => {
                 this.usersList = resp.data.data;

                 console.log(this.usersList);
                
                 });
            },

        getCategory(){
                  window.axios.get("/api/categories").then((resp)=> {
                    this.categoryList =resp.data;

                    console.log(this.categoryList);
                });
            },       
      
    },

    computed:{

        ricerca: function() {
          axios.post('/search', {
            filtri: this.filtri,
          })
          .then(resp => {
            this.usersList = resp.data.data;
          });
        },

    },

    mounted() {
        this.getUsers();
        this.getCategory();
    }

}
</script>

<style lang="scss">

</style>