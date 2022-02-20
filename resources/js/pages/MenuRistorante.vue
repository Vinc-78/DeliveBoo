<template>
        <div class="container">
            <div v-if="this.MyMenu != null">

                <div class="text-center title-menu mb-5 ">

                   <h1 class="border-bottom border-dark pb-4"> {{MyMenu.name}} </h1><!-- MyMenu è User -->  

                    <!-- <h4>Del ristorante :</h4> -->

                     <h3 class="pt-3">Menù</h3>

                </div>

                            
                <div class="row row-cols-lg-4  row-cols-sm-2  row-cols-md-3  mt-mb-4" >

                    <div class="col text-center mb-3" v-for="menu in MyMenu.dishes" :key="menu.id" >

                        <div class="piatto"  v-if="menu.visibility">
                            <!-- Lo stile dell'immagine funziona in line -->
                            <img style="object-fit: cover; 
                            
                            height: 150px;
                            " 
                            
                            :src="'/storage/' + menu.image_url" class="img-dish w-75" alt="">

                            <div class="piatto">
                                <p class="mt-3 mb-4 border-bottom border-dark font-weight-bold"> {{menu.name}}</p>
                                
                                <p style="height:80px" class="mb-3">{{menu.description}}</p>

                            </div>

                            <div>
                                <p class="mb-4">{{menu.price}} € </p>
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
            MyMenu: []
        }
    },
    mounted() {
        // console.log(this.$route.params.id);
        let slug = this.$route.params.slug
        window.axios.get(`/api/menu/${slug}`).then((resp) => {
            // console.log(resp.data.data/* .dishes */); 
            this.MyMenu = resp.data.data
        })
    }
}


</script>

<style lang="scss" scope>

.titleMenu{
        font-family: cursive;
        
        h1{
            font-weight: bold;
            padding-bottom: 50px!important;
        };
        h4{
            color: rgb(172, 170, 170);
        }

       
      

      

}

</style>
