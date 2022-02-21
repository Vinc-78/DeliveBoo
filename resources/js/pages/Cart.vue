<template>

    <div class="container">

        

        <ul class="list-group">
              <li v-for="currentDish in currentCart" :key="currentDish.id" class="list-group-item">
                <p class="m-0">{{ currentDish.qta }} X {{ currentDish.product.name }}</p>
              </li>
        </ul>

    </div>
  
</template>

<script>
export default {
     name: "Cart",
     data() {
         return {
             currentCart: []
         }
     },

      mounted() {
   
        this.getCurrentCart();
      },
      

     methods: {
         getCurrentCart(){
            const cart = JSON.parse(localStorage.getItem("cart"));

            if(cart){
                this.currentCart = cart.content
            }
        },
         
     }


}


</script>



<style>

</style>