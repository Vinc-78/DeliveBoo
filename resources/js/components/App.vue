<template>
  <div>
    <router-view></router-view>

    <Footer></Footer>
  </div>
</template>

<script>
import Footer from "./Footer.vue";

export default {
    name:'App',
    components: { Footer },
    data() {
        return{
            

        }
    }

}
</script>

<style lang="scss">
     body{
         background-image: url('/storage/img/sfondopagine.webp');
         background-size: 100%;
         background-repeat: repeat;
     }
</style>