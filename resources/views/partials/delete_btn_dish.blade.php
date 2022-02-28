<form action="{{route('admin.dishes.destroy', $dish->id)}}" method="POST"
    class="form-delete">
    @csrf
    @method('DELETE')
    <button class="button2" type="submit" class="" style="background-color: red; margin-left: 15px">
        Elimina piatto
    </button>

</form>


<script>
    const formsDelete = document.querySelectorAll(".form-delete");

    formsDelete.forEach(form => {

        form.addEventListener("submit", (e) =>{

            e.preventDefault();

            const popUp = document.querySelector(".for-delete");

            popUp.innerHTML = `
                    <div class="pop" style="
                                background-color:white; 
                                z-index: 100; 
                                width: 400px; 
                                height: 300px; 
                                position: absolute; 
                                top:150px; left:340px;
                                box-shadow: 2px 2px 3px black;
                                text-align: center;
                                border-radius:20px;"
                                >

                                <p style="color: red;
                                padding-top: 10%;
                                font-weight: bold;
                                font-size: 25px;">
                                Sei sicuro di voler cancellare ?</p>

                                <p style="color: red;
                                font-size: 60px;
                                " >&#9888;</P>
                                
                                
                                            
                                <div class="d-flex justify-content-center">
                                    <button  class="cancella  btn btn-danger btn-lg mx-2" >
                                    Cancella</button>

                                    <button class="esci btn btn-secondary btn-lg mx-2"> 
                                    Chiudi</button>
                                </div>
                    </div> 
                    
                     `

           
            const cancella = document.querySelector(".cancella");
            cancella.addEventListener('click', function(){

                form.submit();
               
            })

            const esci = document.querySelector(".esci")
            esci.addEventListener('click', function(){
               
               window.location.reload()
           })

            
            

        })
    })      

           

</script>