<template>
        <div class="container">
            <div v-if="this.MyMenu != null">

                <div class="text-center title-menu mb-5 ">

                   <h1 class="border-bottom border-dark pb-4"> {{MyMenu.name}} </h1><!-- MyMenu è User -->  
                    
                    <Cart></Cart>
                    <!-- <h4>Del ristorante :</h4> -->

                     <h3 class="pt-3">Menù</h3>

                </div>

                            
                <div class="row row-cols-lg-4  row-cols-sm-2  row-cols-md-3  mt-mb-4" >

                    <div class="col text-center mb-3" v-for="dishChoose in MyMenu.dishes" :key="dishChoose.id" >

                        <div class="piatto"  v-if="dishChoose.visibility">
                            <!-- Lo stile dell'immagine funziona in line -->
                            <img style="object-fit: cover; 
                            
                            height: 150px;
                            " 
                            
                            :src="'/storage/' + dishChoose.image_url" class="img-dish w-75" alt="">

                            <div class="piatto">
                                <p class="mt-3 mb-4 border-bottom border-dark font-weight-bold"> {{dishChoose.name}}</p>
                                
                                <p style="height:80px" class="mb-3">{{dishChoose.description}}</p>

                            </div>

                            <div>
                                <p class="mb-4">{{dishChoose.price}} € </p>
                            </div>
                            
                            <button class="btn btn-info" @click="addToCart(dishChoose)">+</button>
                            <button class="btn btn-info" @click="addToCart(dishChoose)">-</button>

                        </div>

                        

                    </div>

                     <!-- dishChoose è il piatto -->
                
                </div>
            </div>

            <div v-else>
                <h1>non ci sono menu al momento</h1>
            </div>
        </div>
</template>

<script>
import Cart from "../components/Cart.vue";

export default {
    name: "MenuRistorante",
    components: { Cart },
    data(){
        return {
            MyMenu: []
        }
    },
    mounted() {
        // console.log(this.$route.params.id);
        let id = this.$route.params.id
        window.axios.get(`/api/menu/${id}`).then((resp) => {
            // console.log(resp.data.data/* .dishes */); 
            this.MyMenu = resp.data.data
        })
    },

    methods: {
    addToCart(dishChoose) {
      if (!localStorage.getItem("cart")) {
        localStorage.setItem("cart", JSON.stringify([]));
      }
      /* /**
       * @type array
       */
      const cart = JSON.parse(localStorage.getItem("cart"));
      const exists = cart.find((el) => el.id === dishChoose.id);
      if (exists) {
        exists.qta++;
      } else {
        cart.push({
          qta: 1,
          id: dishChoose.id,
          product: dishChoose,
        });
      }
      /* console.log(JSON.parse(localStorage.getItem('cart'))) */
      localStorage.setItem("cart", JSON.stringify(cart));
      window.dispatchEvent(new CustomEvent("cartUpdated"))
      
    },
  },
}


</script>

<style lang="scss" scope>

.titleMenu{
        font-family: cursive;
        
        h1{
            font-weight: bold;
            padding-bottom: 50px!important;
        };
        h4{
            color: rgb(172, 170, 170);
        }

       
      

      

}

</style>