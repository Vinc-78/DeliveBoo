<template>
        <div class="container">
            <div v-if="this.MyMenu != null">

                <div class="text-center title-menu mb-5 ">

                   <h1 class="border-bottom border-dark pb-4"> {{MyMenu.name}} </h1><!-- MyMenu è User -->  
                       
                       <!-- Carello -->

                       <div class="">
                        <button @click="showCart = !showCart">
                            Cart {{ totalQuantity }}
                           <!--  <i class="fas fa-shopping-cart"></i> -->
                        </button>
                        <!-- <span class="total-quantity">{{ totalQuantity }}</span> -->
                        <div v-if="showCart" class="">
                            <ul class="">
                            <li
                                v-for="dishChoose in cart"
                                :key="dishChoose.id"
                            >
                                {{ dishChoose.name }} ({{ dishChoose.quantity }})
                            </li>
                            </ul>
                        </div>
                        </div>
                                        <!-- <Cart></Cart> -->
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
                            
                            <div class="cart">

                            <button @click="updateCart(dishChoose, 'subtract')" class="cart-button"> - </button>
                            <span class="cart__quantity">{{ product.quantity }}</span>
                            <button @click="updateCart(dishChoose, 'add')" class="cart-button">  + </button>
                            
                            </div>
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
/* import Cart from "../components/Cart.vue"; */

export default {
    name: "MenuRistorante",
    /* components: { Cart }, */
    data(){
        return {
            MyMenu: [],
            dishChoose:[
                {
                qta: 1,
                id: dishChoose.id,
                }
            ],
            showCart: false,
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

    computed: {
    cart() {
      return this.dishChoose.filter(dishChoose => dishChoose.quantity > 0);
    },
     totalQuantity() {
      return this.dishChoose.reduce(
        (total, dishChoose) => total + dishChoose.quantity,
        0
      );
    }

   /*  totalQuantity() {
        return this.cart.map(item => item.price)
        .reduce((total, amount) => total + amount);
    } */
  },

    methods: {

        updateCart(dishChoose, updateType) {      
        for (let i = 0; i < this.dishChoose.length; i++) {
          if (this.dishChoose[i].id === dishChoose.id) {
            if (updateType === 'subtract') {
              if (this.dishChoose[i].quantity !== 0) {
                this.dishChoose[i].quantity--;
              }
            } else {
              this.dishChoose[i].quantity++;
            }
            
            break;
          }
        }
      }
    }
   /*  addToCart(dishChoose) {
      if (!localStorage.getItem("cart")) {
        localStorage.setItem("cart", JSON.stringify([]));
      }
      
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
       console.log(JSON.parse(localStorage.getItem('cart'))) 
      localStorage.setItem("cart", JSON.stringify(cart));
      window.dispatchEvent(new CustomEvent("cartUpdated"))
      
    }, */
  };
  


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