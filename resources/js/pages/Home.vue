<template>

<div class="">
  <div class="jumbo" style="background-image: url('../storage/img/provasfondo2.jpg')">
      <div class="title-jumbo text-center">
        <h1>Welcome to Deliveboo.</h1>
        <p> Ordina con Deliverboo e ricevi ciò che vuoi da ristoranti nella tua città.<br>
            Tutti i tuoi piatti preferiti in un unico portale.
        </p>
        <!-- Qui ci andrà il bottone route-link -->
        <div class="get-start">
          <router-link :to="{ name:'search' }" class=""><h2>Esplora i Ristoranti</h2></router-link>
        </div>
    </div>
  </div>
    
    
  <!-- Sezione suggerimenti categorie -->

  <Slider class="d-none d-lg-block d-xl-block m-auto"></Slider>  

  <SliderMidle class="d-none d-md-block d-lg-none m-auto"></SliderMidle>

  <SliderSmall class="d-sm-block d-md-none m-auto "></SliderSmall>
    
  <!-- Banner Lavora con Noi -->

  <div class="mt-5 mb-2 banner-container">
    <a href="/register">
    <img src="/storage/img/work-with-us.jpg" alt="" class="imgBanner">
    <h3 class="text-banner">Lavora con Deliveboo per portare i tuoi piatti nelle case della città</h3>
    </a>
  </div>
</div>

  

      
</template>

<script>
import Slider from "../components/Slider.vue";
import SliderSmall from "../components/SliderSmall.vue"
import SliderMidle from "../components/SliderMidle.vue"

export default {
  name: "App",
  components: { Slider, SliderSmall, SliderMidle },
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

.jumbo{
  height: 500px;
  width: 100%;
  background-repeat: no-repeat;
  background-position: bottom;
  background-size: cover;
  position: relative;
  box-shadow: 2px 4px 3px #313131;
   
    .title-jumbo{
       position: absolute;
       top: 50%;
       left: 50%;
       transform: translate(-50% , -50%);
       color: white;

       h1{
         font-size: 70px;
         font-weight: bold;
         text-shadow: 
		     -0.0075em 0.0075em 0 mix(rgb(26, 22, 22), #1a1517, 94%),
		     0.005em 0.005em 0 mix(rgb(31, 25, 25), #181516, 60%),
		     0.01em 0.01em 0 mix(rgb(192, 169, 39), rgb(17, 14, 15), 62%), 
		     0.015em 0.015em mix(rgb(27, 25, 25), rgb(27, 21, 23), 64%), 
		     0.02em 0.02em 0 mix(rgb(10, 9, 9), #1d1316, 66%), 
		     0.025em 0.025em 0 mix(rgb(3, 3, 3), #0f0b0c, 68%),
		     0.03em 0.03em 0 mix(rgb(7, 6, 6), #161012, 70%),
		     0.035em 0.035em 0 mix(rgb(2, 2, 2), #110e0f, 72%);
      }
       p{
        font-weight: bold;
        font-size: 20px;
        text-shadow: 3px 2px 2px black, 0 0 25px rgb(36, 36, 39), 0 0 5px rgb(41, 41, 48);
       }
       .get-start{
         text-align: center;
         color: white;
         font-weight: bold;
         font-size: 25px;
         text-shadow: 1px 1px 2px rgb(2, 2, 2), 0 0 25px rgb(33, 33, 36), 0 0 5px rgb(32, 32, 32);

         a{color: #f2bf25;
          text-decoration: none;}
       }
    }
}
.imgBanner{
  height: 400px;
  width: 100%;
  object-fit: cover;
  object-position: center;
  filter: brightness(70%);
}
.banner-container{
    box-shadow: 2px 3px 2px #313131;
    width: 100%;
    position: relative;
    // margin-left: -19%;
    border-top: 1px solid black;

        
     .text-banner{
         position: absolute;
         top: 50%;
         left: 46%;
         transform: translate(-50% , -50%);
         color: white;
         font-size: 50px;
         text-shadow: 1px 1px 2px rgb(2, 2, 2), 0 0 25px rgb(33, 33, 36), 0 0 5px rgb(32, 32, 32);
         text-align: center;
         
     }

     .text-banner:hover{
    transform: scale(1.2) translate(0);
    top: 40%;
    left: 21%;
    width: 51%;

     }
}
.get-start{

  font-weight: bold;
   h2:hover{
      transform: scale(1.2) translate(0);
   }
}
</style>