<template>
    <div class="container">
        <div>
        <div class="mt-5 mb-5">
        <h1 class="text-center slider-text">TROVA IL RISTORANTE ADATTO A TE</h1>
        </div>
        <div id="carouselExampleControlsM" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                    
                         <div class="container">
                             <div class="row text-white">
                                  <div class="col slider-box" >
                                        <img src="/storage/img/category/carne.jpg" alt=""  class=""/>
                                        <div class="carousel-caption d-none d-md-block slider-text">
                                            <router-link  
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Carne</h3>
                                            </router-link>
                                        </div>
                                 </div>
                                   <div class="col slider-box" >
                                        <img src="/storage/img/category/dessert.jpg" alt="" />
                                        <div class="carousel-caption d-none d-md-block slider-text">
                                            <router-link  
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Dessert</h3>
                                            </router-link>
                                        </div>
                                 </div>
                                  
                             </div>
                         </div>
                    
                    </div>
                    
                    <div class="carousel-item">

                        <div class="container">
                             <div class="row text-white">
                                  <div class="col slider-box" >
                                        <img src="/storage/img/category/indiano.jpg" alt="" />
                                        <div class="carousel-caption d-none d-md-block slider-text">
                                            <router-link  
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Indiano</h3>
                                             </router-link>
                                        </div>
                                 </div>
                                   <div class="col slider-box" >
                                        <img src="/storage/img/category/italiano.jpg" alt="" />
                                        <div class="carousel-caption d-none d-md-block slider-text">
                                            <router-link  
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Italiano</h3>
                                             </router-link>
                                        </div>
                                 </div>
                                   
                             </div>
                         </div>
                    </div>

                    <div class="carousel-item">

                       <div class="container">
                             <div class="row text-white">
                                  <div class="col slider-box" >
                                        <img src="/storage/img/category/pesce.jpg" alt="" />
                                        <div class="carousel-caption d-none d-md-block slider-text">
                                            <router-link  
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Pesce</h3>
                                             </router-link>
                                        </div>
                                 </div>
                                   <div class="col slider-box" >
                                        <img src="/storage/img/category/pizza.jpg" alt="" />
                                        <div class="carousel-caption d-none d-md-block slider-text">
                                            <router-link  
                                             :to="{
                                                    name: 'search',
                                                    }">
                                            <h3>Pizza</h3>
                                             </router-link>
                                        </div>
                                 </div>
                                  
                             </div>
                         </div>
                    
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleControlsM" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <h3 class="sr-only"></h3>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControlsM" data-slide="next">
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

<style lang="scss">
.slider-text{
    color: white;
    font-weight: bold;
    text-shadow: 3px 2px 2px black, 0 0 25px rgb(36, 36, 39), 0 0 5px rgb(41, 41, 48);
}

h1{
    font-weight: bold;
    font-style: italic;
}
.slider-box{
    width: 33%;
    
    img{
    object-fit: cover;
    object-position: right bottom;
    height: 300px;
    width:100%;
    box-shadow: 1px 5px 10px #313131;
}
}
.slider-text a{
    color: white;

    &:hover {

       
       text-decoration: none!important;
       color: white!important;
    }

    h3:hover {
        transform: translate(0) scale(1.4);
        font-weight: bold;
        text-shadow: 1px 1px 2px black, 0 0 25px rgb(36, 36, 39), 0 0 5px rgb(41, 41, 48);

    }
   

      
}

</style>