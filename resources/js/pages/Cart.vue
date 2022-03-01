<template>

    <div class="container">

        <h1 class="text-center my-4 title-search">Riepilogo ordine</h1>

        <div class="row box-dish"> 

            <div class="col-6">

                <h3 class="titolo" >I tuoi ordini</h3>

                <ul class="order-list">
                    <li v-for="currentDish in currentCart" :key="currentDish.id" class="">

                        <h4 class="" style="display:inline;">{{ currentDish.product.name }}</h4>

                        <p style="display:inline-block;" class="qta-order">{{ currentDish.qta }} X <span class="">{{ currentDish.product.price }} €  </span></p>

                                      
                    </li>
                </ul>

            </div>

            <div class="col-6 text-center">

                <h3 class="titolo">Totale ordine </h3>

               <h4 class="qta-order"> {{totalPrice}} € </h4>

            </div>

         <div class="col-12 d-flex justify-content-center mb-5">
         <a href="/checkout"><button class="button-55 button-pay">Procedi al pagamento</button></a>
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


            let cart = JSON.parse(localStorage.getItem("cart"));

            cart.totalPrice = this.totalPrice

            localStorage.setItem("cart", JSON.stringify(cart));
        }


         
     }


}


</script>



<style lang="scss" >

.titolo{
  text-align: center;
  padding-bottom: 10px;
  border-bottom: 1px solid black;

}

.qta-order{
    padding-left: 10px;
    font-size: 25px;
    font-weight: bold;
}

.order-list {
  margin-top: 10px;
  list-style: none;
  display: inline-block;

     li {
  border-bottom: 2px #404B51 dotted;
  line-height: 1;
  margin-bottom: 10px;
}

  
}

 

</style>