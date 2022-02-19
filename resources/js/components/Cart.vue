 <template>
  <!-- <ul>
    <li v-for="item in cart" :key="item.id">
      {{ item.qta }} X {{ item.product.title }}
    </li>
  </ul> -->
  <div><button type="button" class="btn btn-primary">Cart {{ getQuantity() }}</button></div>
</template>

<script>
export default {
  data() {
    return {
      cart: Array,
    };
  },

  mounted() {
    this.cart = JSON.parse(localStorage.getItem("cart"));
    window.addEventListener("cartUpdated", () => {
      this.cart = JSON.parse(localStorage.getItem("cart"));
    });

    this.getQuantity()
   
  },
  methods: {
      getQuantity(){
        let total = 0
        if(this.cart === null ) {return total }
        else {
        for(let i = 0 ; i < this.cart.length ; i++ ) {
            this.cart[i]
            total += this.cart[i].qta
        } 
        return total 
      }}
  }
};
</script>

<style lang="scss">

.badge {
  padding-left: 9px;
  padding-right: 9px;
  -webkit-border-radius: 9px;
  -moz-border-radius: 9px;
  border-radius: 9px;
}

#lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px; 
}

</style> 