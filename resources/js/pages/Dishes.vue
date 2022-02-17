<template>

    <div class="container">

        <h1 v-for="dish in allDishes" :key="dish.id">{{dish.name}}</h1>

    </div>
  
</template>

<script>
export default {
 name:"App",
    data() {
        return{
             allDishes: [],
             
        }
    },

    methods: {
/* 
      getDishes() {
            const url = "/api/dishes/" + this.$route.params.dish;
            window.axios
                .get(url)
                .then((resp) => {
                    this.category = resp.data;
                })
           }, */

        getDishes(){
            window.axios.get('/api/dishes/' + this.id).then(resp=>{
                this.allDishes=resp.data
            });
        }
      
      
    },


    mounted() {
        this.getDishes();
              
       
    }

}
</script>

<style lang="scss">

</style>