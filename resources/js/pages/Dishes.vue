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

        getDishes(){

                let id = this.$route.params.id;

                window.axios.get(`/api/dishes/${id}`).then((resp) => {
                 this.allDishes = resp.data;

                
                 });
            },

      
      
    },


    mounted() {
        this.getDishes();
              
       
    }

}
</script>

<style lang="scss">

</style>