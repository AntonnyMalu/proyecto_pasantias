function btnEdit(id){
    //mostramos un Loading
    Swal.fire({
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
        },
    });
    
    let button = document.getElementById("btn_editar_" + id);
    let titulo = document.getElementById("titulo_form");
    let nombre = button.dataset.nombre;
    let cargo = button.dataset.cargo;

    $("#input_nombre").val(nombre);
    $('#input_nombre').trigger('change');
    $("#input_cargo").val(cargo);
    $('#input_cargo').trigger('change');
    $('#input_form_id').val(id);
    $("#input_opcion").val("editar");
    titulo.innerText = "Editar Firmante";
    
}

function btnElim(id){
    let button = document.getElementById("btn_eliminar_" + id);
    let id_firmmante = button.dataset.id;
    let form = document.getElementById("form_eliminar_" + id);
    //motramos la advertencia
    Swal.fire({
        title: '¿Estas seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, bórralo!'
    }).then((result) => {
        //validamos que la respues sea si
        if (result.isConfirmed) {
            //mandamos a enviar el formulario
            form.submit();
        }
    });
}

//CAMBIAR TITULO EN EL CARDVIEW
$("#btn_cancelar").click(function(e){
    let titulo = document.getElementById("titulo_form");
    titulo.innerText = "Crear Usuario";
});

console.log('firmantes-app.js');
