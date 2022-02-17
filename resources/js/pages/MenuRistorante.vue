<template>
        <div class="container">
            <div v-if="this.MyMenu != null">
                <h1>{{MyMenu.name}}</h1>
             <div class="text-center mt-4">
                <h2> Menù</h2>
             </div>
                <div class="d-flex justify-content-center align-items-center">
                <div v-for="menu in MyMenu.dishes" :key="menu.id">
                    <!-- {{menu.name}} -->
                    
                    <div class="card" style="width: 18rem;">
                    <img src="/storage/img/work-with-us.jpg" alt="" class="imgBanner w-100">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
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
    data(){
        return {
            MyMenu: []
        }
    },
    mounted() {
        // console.log(this.$route.params.id);
        let id = this.$route.params.id
        window.axios.get(`/api/menu/${id}`).then((resp) => {
            // console.log(resp.data.data/* .dishes */); 
            this.MyMenu = resp.data.data
        })
    }
}


</script>

<style>

</style>