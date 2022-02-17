<template>
        <div class="container">
            <div v-if="this.MyMenu != null">

                <h1>sto nel menu ristorante singolo</h1>
                
                <h2>
                    {{MyMenu.name}} <!-- MyMenu è User -->
                </h2>

                <div v-for="menu in MyMenu.dishes" :key="menu.id">

                    {{menu.name}}  <!-- menu è il piatto -->
                
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