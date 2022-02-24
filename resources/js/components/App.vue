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
      background-color: #d2e7d6;
  }
</style>