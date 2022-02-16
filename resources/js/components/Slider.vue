<template>
    <div class="container">
        <div>
        <div class="mt-5 mb-5">
        <h1 class="text-align-center">SUGGERIMENTI CATEGORIE</h1>
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                    
                         <div class="container">
                             <div class="row text-white">
                                  <div class="col" style="width:33%">
                                        <img src="/storage/img/category/carne.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <router-link 
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Carne</h3>
                                            </router-link>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/dessert.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <router-link 
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Dessert</h3>
                                            </router-link>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/hamburger.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <router-link 
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Hamburger</h3>
                                             </router-link>
                                        </div>
                                 </div>
                             </div>
                         </div>
                    
                    </div>
                    
                    <div class="carousel-item">

                        <div class="container">
                             <div class="row text-white">
                                  <div class="col" style="width:33%">
                                        <img src="/storage/img/category/indiano.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <router-link 
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Indiano</h3>
                                             </router-link>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/italiano.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <router-link 
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Italiano</h3>
                                             </router-link>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/orientale.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <router-link 
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Orientale</h3>
                                             </router-link>
                                        </div>
                                 </div>
                             </div>
                         </div>
                    </div>

                    <div class="carousel-item">

                       <div class="container">
                             <div class="row text-white">
                                  <div class="col" style="width:33%">
                                        <img src="/storage/img/category/pesce.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <router-link 
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Pesce</h3>
                                             </router-link>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/pizza.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <router-link 
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Pizza</h3>
                                             </router-link>
                                        </div>
                                 </div>
                                   <div class="col" style="width:33%">
                                        <img src="/storage/img/category/vegano.jpg" alt=""  style="width:100%"/>
                                        <div class="carousel-caption d-none d-md-block">
                                            <router-link 
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Vegano</h3>
                                             </router-link>
                                        </div>
                                 </div>
                             </div>
                         </div>
                    
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <h3 class="sr-only"></h3>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <h3 class="sr-only"></h3>
                </button>
        </div>
   </div>
    </div>
</template>
<script>
export default {};
</script>

<style>
</style>