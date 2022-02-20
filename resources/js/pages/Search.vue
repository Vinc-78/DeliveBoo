<template>

    <div class="container">

    <div class="row justify-content-center mx-sm-5">
            <div class="col-sm-12 d-md-flex altezza">

              <div class="container">

                  <h1 class="my-5">Scegli cosa vuoi mangiare</h1>

                  <div class="row row-cols-lg-5  row-cols-sm-2  row-cols-md-3  mt-mb-4">

                    <!--Stampa delle categorie  con check box-->
                    <div class="col" v-for="category in categoryList" :key="category.id">
                      <input :id="category.id" type="checkbox"
                            :value="category.name"
                            v-model="filters" >
                      <label class="checkbox-label position-relative" :for="category.id" >
                        <div class="position-relative">
                        <img  class="img-category" :src="'/storage/img/category/' + category.img_category" alt="category.name" >
                        
                        <span class="nome-search">{{ category.name }}</span>
                        </div>
                      </label>
                    </div>

                             
                      
                   
                 
                </div>

                <h1 class="my-5">I ristoranti che hai selezionato</h1>

                <h3 class="my-3 text-center">Clicca per vedere il menu </h3>

                <h2 class="text-center font-weight-bold display-4 my-4" v-if='usersList.length === 0'>Non ci sono Ristoranti che rispettano la tua ricerca</h2>

                <div class="row row-cols-lg-2  row-cols-sm-1   mt-mb-4">

                    <!-- stampo i ristoranti  -->
              
                  <div v-for="user in usersList" :key="user.id" class="col">

                    <router-link :to="{ name: 'menu', params: { slug: user.slug }}"> 
                      <img  class="img-restaurant" :src="'storage/' + user.cover_img" alt="" >
                        
                      <div class="p-3 ">
                        <h4> <strong>  {{ user.name }}   </strong> </h4>
                        
                        <span> Indirizzo  {{user.address}} </span>  
                        <br>
                            
                      </div>
                    </router-link>
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
                window.axios.get("/api/users",
                )
                .then((resp) => {
                 this.usersList = resp.data.data;

    
                 });
            },

        getCategory(){
                  window.axios.get("/api/categories").then((resp)=> {
                    this.categoryList =resp.data;
                
                   
                });
            },   

        filterUsers() {

        
        
          window.axios.post('/search', {
                params: {
                      filtri: this.filters
                  }
          })
          .then((resp) => { 
            this.usersList = resp.data;
            
            
          });
        }, 
  
      
    },

    watch: {
        filters: {
            handler: function() {
                this.filterUsers();
            },

            deep:true
        }
    },

    mounted() {
        this.getUsers();
        this.getCategory();
        
       
    }

}
</script>

<style>

.img-category{
  width:150px; 
  height:150px;
  object-fit: cover;
  filter: brightness(0.8);
  border-radius: 10%;
  
}

.nome-search{
  font-weight: bold;
  font-size: 25px;
  position: absolute;
  top: 50%;
  left: 50%;
  color: white;
  transform: translate(-50%, -50%);
  
}

.img-restaurant{
  width:400px; 
  height:300px;
  object-fit: cover;
}

input[type="checkbox"]{
  display: none;
}

/* .checkbox-label {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
} */

.checkbox-label:before {
  background-color: white;
  color: white;
  content: "";
  display: block;
  border-radius: 50%;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition: 0.4s;
  transform: scale(0)
}

.checkbox-label .img-category {
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

/* .checkbox-label .nome-search{
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
} */

.checkbox-label .nome-search{
  transition-duration: 0.2s;
  font-size: 20px;
}

:checked + .checkbox-label:before {
  content: "✓";
  background-color: green;
  transform: scale(1);
  z-index: 99;
}

:checked + .checkbox-label .img-category {
  transform: scale(0.9);
  box-shadow: 0 0 5px #333;
  z-index: -1;
}



</style>