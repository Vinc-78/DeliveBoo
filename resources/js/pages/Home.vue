<template>

    <div class="container">

        <h1>{{msg}}</h1>

        

    </div>
  
</template>

<script>
export default {
 name:"App",
    data() {
        return{
            msg:" Funziona !!!",
             usersList: [],
             categoryList: [],
        }
    },

    methods: {

        getUsers(){
                window.axios.get("/api/users").then((resp) => {
                 this.usersList = resp.data;

                 console.log(this.usersList);
                
                 });
            },

        getCategory(){
                  window.axios.get("/api/categories").then((resp)=> {
                    this.categoryList =resp.data;

                    console.log(this.categoryList);
                });
        }

        
      
    },

    mounted() {
        this.getUsers();
        this.getCategory();
    }

}
</script>

<style lang="scss">

</style>