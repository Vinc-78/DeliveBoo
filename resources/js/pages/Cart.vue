<template>

    <div class="container">

        <h1 class="text-center my-4">Il tuo ordine</h1>

        <div class="row"> 

            <div class="col-6">

                <h3 class="titolo" >Piatti inseriti </h3>

                <ul class="d-flex flex-column">
                    <li v-for="currentDish in currentCart" :key="currentDish.id" class="piatto-singolo">

                        <h5>{{ currentDish.product.name }}</h5>

                        <p style="text-align: left;" class="">Qta {{ currentDish.qta }} X {{ currentDish.product.price }} € </p>

                                      
                    </li>
                </ul>

            </div>

            <div class="col-6">

                <h3>Totale ordine </h3>

                {{totalPrice}}
                
            </div>

        </div>

       

    </div>
  
</template>

<script>
export default {
     name: "Cart",
     data() {
         return {
             currentCart: [],
             totalPrice: 0,
             parziale: 0,
         }
     },

      mounted() {
   
        this.getCurrentCart();
        this.sommaTotale(); 
      },


     methods: {
         getCurrentCart(){
            const cart = JSON.parse(localStorage.getItem("cart"));

            if(cart){
                this.currentCart = cart.content
            }
        },

        sommaTotale() {


            this.getCurrentCart();

            this.currentCart.forEach(element => {

                let prezzo = parseInt(element.product.price );

                let quantità = element.qta;

                let costoPiatto = prezzo * quantità; 
                
                this.parziale = this.parziale + costoPiatto; 
                
            });

            this.totalPrice = this.parziale; 

        }
         
     }


}


</script>



<style lang="scss" >

.piatto-singolo {
display: flex;
flex-direction: column;




}



</style>