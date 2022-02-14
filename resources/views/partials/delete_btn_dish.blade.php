<form action="{{route('admin.dishes.destroy', $dish->id)}}" method="POST"
    class="form-delete">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">
        Elimina piatto
    </button>

</form>


<script>
    const formsDelete = document.querySelectorAll(".form-delete");

    formsDelete.forEach(form => {

        form.addEventListener("submit", (e) =>{

            e.preventDefault();

            const result = confirm("Sei sicuro di voler canlcellare ? L'operazopne sarà irreversibile !!!");

            if(result){
                form.submit();
            }

        })
    })

</script>