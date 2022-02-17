<template>

    <div class="container">

    

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
                window.axios.get("/api/dishes").then((resp) => {
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