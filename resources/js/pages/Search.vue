<template>

    <div class="container">

    <div class="row justify-content-center mx-sm-5">
            <div class="col-sm-12 d-md-flex altezza">

              <div class="container">

                  <h1>Scegli cosa vuoi mangiare</h1>

                  <div class="row row-cols-4  mt-md-4">

                    <!--Stampa delle categorie  con check box-->
                   
                    <label class="check col-sm" v-for="category in categoryList" :key="category.id">
                      
                      <img  class="img-category" :src="'/storage/img/category/' + category.img_category" alt="category.name">
                      <br>
                      <span class="nome-search">{{ category.name }}</span>
                      <input class="check-box" type="checkbox"
                            :value="category.name"
                            v-model="filtri"
                            @change="ricerca()"
                      >
                    </label>
                 

                 <!-- stampo i ristoranti  -->
                <div class="col-sm-12 col-md-10 d-flex flex-wrap align-items-start mt-md-5 mx-auto">

                    <div
                        v-for="user in usersList"
                        :key="user.id"
                        class="user"
                    >

                        <a href=""> <!-- '/show/' + users.id -->  <!-- Serve il router-link -->
                            <div class="image" >
                                <img  :src="'storage/' + user.cover_img" alt="" >
                               
                            </div>
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
        
        

    </div>
  
</template>

<script>
export default {
 name:"App",
    data() {
        return{
             filtri:[],
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
      
    },

    computed: {

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

</style>