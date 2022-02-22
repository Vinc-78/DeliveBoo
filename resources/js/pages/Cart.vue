<template>

    <div class="container">

        <h1 class="text-center my-4">Il tuo ordine</h1>

        <div class="row"> 

            <div class="col-6">

                <h3 class="titolo" >Piatti inseriti </h3>

                <ul class="d-flex flex-column">
                    <li v-for="currentDish in currentCart" :key="currentDish.id" class="piatto-singolo">

                        <h4 class=" font-weight-bolder">{{ currentDish.product.name }}</h4>

                        <p style="text-align: left;" class=""><span class="font-weight-bolder">Qta {{ currentDish.qta }}  </span> X <span class="font-weight-bolder">{{ currentDish.product.price }} €  </span></p>

                                      
                    </li>
                </ul>

            </div>

            <div class="col-6 text-center">

                <h3>Totale ordine </h3>

               <h4 class=" font-weight-bolder"> {{totalPrice}} € </h4>


               <a href="/checkout"><button class="btn btn-success"> Completa l'ordine </button></a>

                
                
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

.piatto-singolo {
display: flex;
flex-direction: column;




}



</style>