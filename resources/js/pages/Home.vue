<template>

    <div class="container">

        <!-- <div v-for="category in categoryList" :key="category.id">
            <h2>{{category.name}}</h2>
            <img :src="'/storage/img/category/' + category.img_category" alt="">
        </div>
        <div v-for="user in usersList" :key="user.id">
            <h2>{{user.name}}</h2>
            <img :src="'/storage/' + user.cover_img" alt="">
        </div> -->

        
        

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
                 this.usersList = resp.data.data;

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