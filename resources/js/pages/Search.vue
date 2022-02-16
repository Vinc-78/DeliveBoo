<template>

    <div class="container">

    <div class="row justify-content-center mx-sm-5">
            <div class="col-sm-12 d-md-flex altezza">

              <div class="container">

                  <h1 class="my-5">Scegli cosa vuoi mangiare</h1>

                  <div class="row row-cols-lg-4  row-cols-sm-2  row-cols-md-3  mt-mb-4">

                    <!--Stampa delle categorie  con check box-->
                   
                    <label class="check col" v-for="category in categoryList" :key="category.id">
                      
                      <img  class="img-category" :src="'/storage/img/category/' + category.img_category" alt="category.name">
                      <br>
                      <span class="nome-search">{{ category.name }}</span>
                      <input class="check-box" type="checkbox"
                            :value="category.name"
                            v-model="filters"
                            @change="ricerca()"
                      >
                    </label>
                 
                </div>

                <h1 class="my-5">I ristoranti che hai selezionato</h1>

                <h3 class="my-3 text-center">Clicca per vedere il menu </h3>

                <div class="row row-cols-lg-2  row-cols-sm-1   mt-mb-4">

                      <!-- stampo i ristoranti  -->
                
                    <div
                        v-for="user in usersList"
                        :key="user.id"
                        class="col"
                    >

                        <a href=""> <!-- '/show/' + users.id -->  <!-- Serve il router-link -->
                            
                            <img  class="img-restaurant" :src="'storage/' + user.cover_img" alt="" >
                               
                            
                            <div class="p-3 ">
                                <h4> <strong>  {{ user.name }}   </strong> </h4>
                                
                                <span> Indirizzo  {{user.address}} </span>  <br>
                               
                                
                            </div>
                       </a>

                    </div>

                

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
             filters: [],
             usersList: [],
             categoryList: [],
        }
    },

    methods: {

        getUsers(){
                window.axios.get("/api/users").then((resp) => {
                 this.usersList = resp.data.data;

                
                
                 });
            },

        getCategory(){
                  window.axios.get("/api/categories").then((resp)=> {
                    this.categoryList =resp.data;
                
                   
                });
            },   
            /* ricerca i ristoranti  */

          /* ricerca: function() {

              axios.get('/search', {
                
                filters: this.filters,
                
              })
              .then(resp => {
              
                this.usersList = resp.data.data;
              })
          
          }, */

         ricerca() {

           const filtri =this.$route.query.filtri;

          window.axios.post('/search', {
          params: {
            filters: this.filters,
            }
          })
          .then(resp => {
            this.usersList = resp.data.data;
          });
        },     
      
    },

    watch: {

      filters: {
        reload: function() {
          this.ricerca(); 
        }
      }

    },
    

   

    mounted() {
        this.getUsers();
        this.getCategory();
        
       
    }

}
</script>

<style lang="scss">

.img-category{
  width:150px; 
  height:150px;
  object-fit: cover;
  
}

.nome-search{
  font-weight: bold;
  font-size: 25px;
}

.check-box {
  margin-left:18px;
  height: 18px;
  width: 18px;
}

.img-restaurant{
  width:400px; 
  height:300px;
  object-fit: cover;
}

</style>