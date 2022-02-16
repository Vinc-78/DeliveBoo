<template>

<section class="container">
    <div class="mt-5 mb-50">
      
      <div class="row d-flex justify-content-center align-items-center ">
      <div class="col-xs-12 col-sm-12 col-lg-6 d-flex justify-content-center align-items-center">
        <img src="/storage/img/work-with-us.jpg" alt="" />
      </div>
      <div class="col-xs-12 col-sm-12 col-lg-6 d-flex flex-column  justify-content-center  align-items-xs-center align-items-sm-center">
          <h1>Welcome to Deliveboo.</h1>
          <p> Ordina con Deliverboo e ricevi ciò che vuoi da ristoranti nella tua città.<br>
              Tutti i tuoi piatti preferiti in un unico portale.
          </p>
          <!-- Qui ci andrà il bottone route-link -->
          <router-link :to="{}" class="">Esplora i Ristoranti</router-link>
      </div>
      </div>
    
    </div>
    <!-- Sezione suggerimenti categorie -->

    <div>
        <h1 class="text-align-center">SUGGERIMENTI CATEGORIE</h1>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                    
                         <div class="container">
                             <div class="row text-white">
                                  <div class="col" style="width:33%">
                                        <img src="/storage/img/category/carne.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <router-link 
                                             :to="{
                                                    name: 'home',
                                                    }">
                                            <h3>Carne</h3>
                                            </router-link>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/dessert.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Dessert</h3>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/hamburger.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Hamburger</h3>
                                        </div>
                                 </div>
                             </div>
                         </div>
                    
                    </div>
                    
                    <div class="carousel-item">

                        <div class="container">
                             <div class="row text-white">
                                  <div class="col" style="width:33%">
                                        <img src="/storage/img/category/indiano.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Carne</h3>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/italiano.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Dessert</h3>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/orientale.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Hamburger</h3>
                                        </div>
                                 </div>
                             </div>
                         </div>
                    </div>

                    <div class="carousel-item">

                       <div class="container">
                             <div class="row text-white">
                                  <div class="col" style="width:33%">
                                        <img src="/storage/img/category/pesce.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Carne</h3>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/pizza.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Dessert</h3>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/vegano.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Hamburger</h3>
                                        </div>
                                 </div>
                             </div>
                         </div>
                    
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <h3 class="sr-only"></h3>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <h3 class="sr-only"></h3>
                </button>
        </div>







       <!--  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
         
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="container bg-dark text-white">
        <div class="row">
        <div class="col" style="width:33%">
       <img src="/storage/img/work-with-us.jpg" alt=""  style="width:100%"/>
       <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
        </div>
         <div class="col" style="width:33%">
       <img src="/storage/img/category/carne.jpg" alt="" style="width:100%"/>
       <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
        </div>
        <div class="col" style="width:33%">
       <img src="/storage/img/category/italiano.jpg" alt="" style="width:100%" />
       <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
        </div>
        </div>
    </div>
      
    </div>
    <div class="carousel-item">
      <div class="container bg-dark text-white">
        <div class="row">
        <div class="col" style="width:33%">
       <img src="/storage/img/category/hamberger.jpg" alt=""  style="width:100%"/>
       <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
        </div>
         <div class="col" style="width:33%">
       <img src="/storage/img/category/vegano.jpg" alt="" style="width:100%"/>
       <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
        </div>
        <div class="col" style="width:33%">
       <img src="/storage/img/category/dessert.jpg" alt="" style="width:100%" />
       <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
        </div>
        </div>
    </div>
    <div class="carousel-item">
      <img src="" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev bg-dark text-white" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next bg-dark text-white" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> -->
    </div>
</section>





    <!-- <div class="container">

        <div v-for="category in categoryList" :key="category.id">

            <h2>{{category.name}}</h2>

            <img :src="'/storage/img/category/' + category.img_category" alt="">

        </div>

        <div v-for="user in usersList" :key="user.id">

            <h2>{{user.name}}</h2>

            <img :src="'/storage/' + user.cover_img" alt="">

        </div>

        
        

    </div> -->
  
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      msg: " Funziona !!!",
      usersList: [],
      categoryList: [],
    };
  },

  methods: {
    getUsers() {
      window.axios.get("/api/users").then((resp) => {
        this.usersList = resp.data.data;

        console.log(this.usersList);
      });
    },

    getCategory() {
      window.axios.get("/api/categories").then((resp) => {
        this.categoryList = resp.data;

        console.log(this.categoryList);
      });
    },
  },

  mounted() {
    this.getUsers();
    this.getCategory();
  },
};
</script>

<style lang="scss">
img {
  height: 300px;
}
h1 {
  text-align: center;
}
p {
  text-align: center;
}
</style>