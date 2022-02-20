<template>
  <div class="container">
    <div v-if="this.myMenu != null">
      <div class="text-center title-menu mb-5">
        <!-- NOME DEL RISTORANTE -->
        <h1 class="border-bottom border-dark pb-4">{{ myMenu.name }}</h1>

        <h3 class="pt-3">Menù</h3>

        <div>
          <router-link to="/cart" class="btn btn-primary"
            >Carrello {{ total }}</router-link
          >
        </div>
      </div>

      <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-md-3 mt-mb-4">
        <!-- STAMPO TUTTI I PIATTI DEL RISTORANTE -->
        <div
          class="col text-center mb-3"
          v-for="dish in myMenu.dishes"
          :key="dish.id"
        >
          <div class="piatto" v-if="dish.visibility">
            <!-- Lo stile dell'immagine funziona in line -->
            <img
              style="object-fit: cover; height: 150px"
              :src="'/storage/' + dish.image_url"
              class="img-dish w-75"
              :alt="dish.name"
            />

            <div class="piatto">
              <p class="mt-3 mb-4 border-bottom border-dark font-weight-bold">
                {{ dish.name }}
              </p>

              <p style="height: 80px" class="mb-3">{{ dish.description }}</p>
            </div>

            <div>
              <p class="mb-4">{{ dish.price }} €</p>
            </div>

            <div>
              <button class="btn btn-success" @click="addToCart(dish)">
                +
              </button>
              <button class="btn btn-warning" @click="removeToCart(dish)">
                -
              </button>
            </div>
          </div>
        </div>

        <!-- menu è il piatto -->
      </div>
    </div>

    <div v-else>
      <h1>non ci sono menu al momento</h1>
    </div>
  </div>
</template>

<script>
export default {
    name: "MenuRistorante",
    data(){
        return {
            myMenu: [],
            total: 0
        }
    },
    mounted() {
        this.getData()  
        this.getTotal()
    },
    methods: {
        getData(){
            // console.log(this.$route.params.id);
            let slug = this.$route.params.slug
            window.axios.get(`/api/menu/${slug}`).then((resp) => {
                // console.log(resp.data.data/* .dishes */); 
                this.myMenu = resp.data.data
            })
        },
        addToCart(dish){
            //se nel local storage non esiste il carrello
            if(!localStorage.getItem("cart")){
                //allora vado a creare la chiave cart e gli associo un array
                localStorage.setItem("cart", JSON.stringify([]))
            }

            // ! in questo modo assegno una chiave per ogni ristorante e poi devo andare a lavorare sul cart di ogni ristorante 
            // localStorage.setItem("cart", JSON.stringify({prova : []}))
            /* let prova = this.myMenu.slug.toString()
            console.log(prova); */


            //recupero la chiave cart dentro la funzione e gli associo l'array che si trova nel cart di local storage
            const cart = JSON.parse(localStorage.getItem("cart"));
            //controllo se il piatto su cui ho cliccato è già presente nell'array 
            const dishExists = cart.find((el) => el.product.id === dish.id)

            //se il piatto è già presente nel cart  
            if(dishExists){
                //allora aumento la quantità
                dishExists.qta++
            }else{
                //altrimenti pusho tutto il piatto con una "qta = 1"
                cart.push(
                    {
                        qta: 1,
                        product: dish
                    }
                )
            }

            localStorage.setItem("cart", JSON.stringify(cart))

            this.total++
        },
        removeToCart(dish){
            const cart = JSON.parse(localStorage.getItem("cart"));

            //questo "if" previene errori in concole nel caso il cart è vuoto (cioè undefined)
            if(cart){

                const dishExists = cart.find((el) => el.product.id === dish.id)

                if(dishExists && dishExists.qta > 1){
                    dishExists.qta--
                }else if(dishExists && dishExists.qta === 1){
                    //recupero l'id del piatto esistente per poi cancellarlo
                    let dishRemove = cart.indexOf(dishExists);
                    // console.log(dishRemove);
                    cart.splice(dishRemove, 1)
                }

                localStorage.setItem("cart", JSON.stringify(cart))

                // questo evita che il totale abbia numeri negativi
                if(this.total){
                    this.total--
                }else{
                    this.total = 0
                }
                
            }            
        },
        getTotal(){
            const cart = JSON.parse(localStorage.getItem("cart"))
            
            // questo evita errori in console nel caso cart sie vuoto (undefined)
            if(cart){
                cart.forEach(element => {
                    this.total += element.qta
                });
            }
        }
    }
}


</script>

<style lang="scss" scope>
.titleMenu {
  font-family: cursive;

  h1 {
    font-weight: bold;
    padding-bottom: 50px !important;
  }
  h4 {
    color: rgb(172, 170, 170);
  }
}
</style>