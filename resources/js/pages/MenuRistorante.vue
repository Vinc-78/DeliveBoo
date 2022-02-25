<template>
  <div class="container">
    <div v-if="myMenu.dishes.length !== 0">
      <div class="text-center title-menu mb-5">
        <!-- NOME DEL RISTORANTE -->
        <h1 class="border-bottom border-dark pb-4 pt-3">{{ myMenu.name }}</h1>

        <h3 class="pt-3">Menù</h3>

        
      </div>

      <div class="row flex-lg-row flex-md-column-reverse flex-sm-column-reverse">
        
        <div class="col-lg-8 col-md-12">

          <div class="row row-cols-lg-3 row-cols-md-3 row-cols-sm-2 mt-mb-4">
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

                <!-- bottoni -->
                <div>
                  <button
                    class="btn btn-success rounded-0"
                    @click="addToCart(dish)"
                  >
                    +
                  </button>
                  <button
                    class="btn btn-warning rounded-0"
                    @click="removeToCart(dish)"
                  >
                    -
                  </button>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-4 col-md-12 my-4 text-center">
          <div>
          <router-link :to="{ name:'cart' }" class="btn btn-primary rounded-0">Carrello {{ total }}</router-link>
        </div>
          <div v-if="currentCart.length === 0 ">
            <h4>Il tuo carrello è vuoto</h4>
          </div>
          
          <div v-else>
            <h4>Il tuo carrello</h4>

            <ul class="list-group">
              <li v-for="currentDish in currentCart" :key="currentDish.id" class="list-group-item">
                <p class="m-0">{{ currentDish.qta }} X {{ currentDish.product.name }}</p>
              </li>
            </ul>
          </div>

        </div>
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
  data() {
    return {
      myMenu: [],
      total: 0,
      currentCart: []
    };
  },
  mounted() {
    this.getData();
    this.getTotal();
    this.getCurrentCart();
  },
  methods: {
    getData() {
      // console.log(this.$route.params.id);
      let slug = this.$route.params.slug;
      window.axios.get(`/api/menu/${slug}`).then((resp) => {
        this.myMenu = resp.data.data;
        // console.log(this.myMenu);
      });
    },
    addToCart(dish) {
      //se nel local storage non esiste il carrello
      if (!localStorage.getItem("cart")) {
        //allora vado a creare la chiave cart e gli associo lo slug del ristorante corrente e il contenuto che avrà il carrello
        localStorage.setItem(
          "cart",
          JSON.stringify({
            slug: this.myMenu.slug,
            content: [],
            totalPrice: 0
          })
        );
      }

      //recupero la chiave cart dentro la funzione e gli associo l'array che si trova nel cart di local storage
      const cart = JSON.parse(localStorage.getItem("cart"));

      //controllo se il piatto su cui ho cliccato è già presente nell'array
      const dishExists = cart.content.find((el) => el.product.id === dish.id);

      //se il piatto è già presente nel cart
      if (dishExists) {
        dishExists.qta++;
      } else {
        //altrimenti pusho tutto il piatto con una "qta = 1"
        cart.content.push({
          qta: 1,
          product: dish,
        });
      }

      localStorage.setItem("cart", JSON.stringify(cart));

      this.setTotal("+");

      //aggiorna il carrello sidebar ogni volta che vengono aggiunti piatti
      if(cart){
        this.currentCart = cart.content
      }
    },
    removeToCart(dish) {
      const cart = JSON.parse(localStorage.getItem("cart"));

      //questo "if" previene errori in concole nel caso il cart è vuoto (cioè undefined)
      if (cart.content) {
        const dishExists = cart.content.find((el) => el.product.id === dish.id);

        if (dishExists && dishExists.qta > 1) {
          dishExists.qta--;
        } else if (dishExists && dishExists.qta === 1) {
          //recupero l'id del piatto esistente per poi cancellarlo
          let dishRemove = cart.content.indexOf(dishExists);
          // console.log(dishRemove);
          cart.content.splice(dishRemove, 1);
        }

        localStorage.setItem("cart", JSON.stringify(cart));

        if(dishExists && dishExists.qta > 0){
          this.setTotal("-");
        }

        //aggiorna il carrello sidebar ogni volta che vengono rimossi piatti
        if(cart){
        this.currentCart = cart.content
        }
      }
    },
    //questa funzione serve di base per aggiornare il contatore in caso di ricaricamento della pagina
    //si potrebbe utilizzare 
    getTotal() {
      const cart = JSON.parse(localStorage.getItem("cart"));

      // questo evita errori in console nel caso cart sie vuoto (undefined)
      if (cart) {
        cart.content.forEach((element) => {
          this.total += element.qta;
        });
      } 
    } ,
    /**
     * @param {string} sign è il segno che indica se la funzione deve sommare o sottrarre
     */
    setTotal(sign) {
      const cart = JSON.parse(localStorage.getItem("cart"));

      // questo evita errori in console nel caso cart sie vuoto (undefined)
      if (cart.content) {
        if (sign === "+") {
          this.total += 1;
        } else if (this.total > 0) {
          this.total -= 1;
        }
      }
    },
    getCurrentCart(){

      const cart = JSON.parse(localStorage.getItem("cart"));

      if(cart){
        this.currentCart = cart.content
      }
    }
  },
  watch: {
    myMenu: function () {

      const restaurant = JSON.parse(localStorage.getItem("cart"));

      //se lo restaurant del ristorante corrente è diverso da quello salvato in local storage, allora pulisco sia il carrello che il totale
      if(restaurant){

        if (this.myMenu.slug !== restaurant.slug) {
          this.total = 0;
          localStorage.clear();
          this.currentCart = []
        }
      }

    }
  }
};
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
