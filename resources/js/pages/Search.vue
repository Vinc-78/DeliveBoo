<template>

    <div class="container">

    <div class="row justify-content-center mx-sm-5">
            <div class="col-sm-12 d-md-flex altezza">

              <div class="container">

                  <h1 class="mt-5 mb-5 title-search">Seleziona la categoria e scegli il ristorante</h1>
                

                  <div class="row row-cols-lg-5  row-cols-sm-2  row-cols-md-3  mt-mb-4">

                    <!--Stampa delle categorie  con check box-->
                    <div class="col" v-for="category in categoryList" :key="category.id">
                      <input :id="category.id" type="checkbox"
                            :value="category.name"
                            v-model="filters" >
                      <label class="checkbox-label position-relative" :for="category.id" >
                        <div class="position-relative">
                        <img  class="img-category" :src="'/storage/img/category/' + category.img_category" alt="category.name" >
                        
                        <span class="name-search">{{ category.name }}</span>
                        </div>
                      </label>
                    </div>

                             
                      
                   
                 
                </div>
                 
                <h2 class="text-center font-weight-bold display-4 my-4 alert-search title-search" v-if='usersList.length === 0'>Siamo spiacenti la
                          sua ricerca non ha dato nessuno risultato</h2>
                <h1 class="my-5  text-center title-search">Clicca sul ristorante per vedere il menù</h1>

          
              <div class="row row-cols-lg-2  row-cols-sm-1   mt-mb-4">

                    <!-- stampo i ristoranti  -->
              
                  <div v-for="user in usersList" :key="user.id" class="col mb-4">

                    <router-link :to="{ name: 'menu', params: { slug: user.slug }}"> 
                      <img  class="img-restaurant" :src="'storage/' + user.cover_img" alt="" >
                        
                      <div class="p-3 name-restaurant">
                        <h4 class="titolo-search"> <strong>  {{ user.name }}   </strong> </h4>
                        
                        <p class="titolo-search"> Indirizzo  {{user.address}} </p>  
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

<style lang="scss">
.alert-search {
  width: auto;
  align-items: center;
  background-color: rgba(248, 242, 242, 0.918);
  color: #000;
  text-align: center;
  border-radius: 20px;
  padding: 30px 30px 70px;
  box-shadow: 4px 7px 10px #313131;
}

.title-search{
  color: white;
  text-shadow: 3px 2px 2px black, 0 0 25px rgb(36, 36, 39), 0 0 5px rgb(41, 41, 48);
  font-weight: bold;
  text-align: center;
  
}

/* Style card category */
.img-category{
  width:150px; 
  height:150px;
  object-fit: cover;
  filter: brightness(0.8);
  border-radius: 10%;
  
}

.name-search{
  font-weight: bold;
  font-size: 25px;
  position: absolute;
  top: 50%;
  left: 50%;
  color: white;
  transform: translate(-50%, -50%);
  text-shadow: 1px 1px 2px black, 0 0 25px rgb(36, 36, 39), 0 0 5px rgb(41, 41, 48);
  
}

input[type="checkbox"]{
  display: none;
}


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

.checkbox-label .nome-search{
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
} 

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

/* Style card Restaurant */

.img-restaurant{
  width:100%; 
  height:300px;
  object-fit: cover;
  position: relative;
  box-shadow: 4px 7px 10px #313131;
}

.name-restaurant{
  width: 60%;
  text-align: center;
  color: white;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50% , -20%);
  text-shadow: 1px 1px 2px rgb(2, 2, 2), 0 0 25px rgb(33, 33, 36), 0 0 5px rgb(32, 32, 32);
  
}

.titolo-search:hover{
   color: #fff; 
   color: #fff; text-shadow: 0px 0 15px #76EE00;
   transform: scale(1.4);
   

}






</style>