<template>

<section class="container p-0">
    <div class="mt-5 mb-5">
      
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
          <router-link :to="{ name:'search' }" class="">Esplora i Ristoranti</router-link>
      </div>
      </div>
    
    </div>
    
    <!-- Sezione suggerimenti categorie -->

    <Slider></Slider>
    
    <!-- Banner Lavora con Noi -->

    <div class="mt-5 mb-5 banner-container">
        <a href="/register">
        <img src="/storage/img/work-with-us.jpg" alt="" class="imgBanner w-100">
        <h1 class="text-banner">Aggiungi il tuo ristorante</h1>
        </a>
    </div>
   

</section>

  

      
</template>

<script>
import Slider from "../components/Slider.vue";

export default {
  name: "App",
  components: { Slider },
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

       /*  console.log(this.usersList); */
      });
    },

    getCategory() {
      window.axios.get("/api/categories").then((resp) => {
        this.categoryList = resp.data;

        /* console.log(this.categoryList); */
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
.imgBanner{
  
  object-fit: cover;
  filter: brightness(50%);
}
.banner-container{
    position: relative;
     
     .text-banner{
         position: absolute;
         top: 50%;
         left: 50%;
         transform: translate(-50% , -50%);
         color: white;
         font-size: 50px;
         
     }
}
</style>