$('#input_cedula').inputmask("9{1,8}");
$('#input_telefono').inputmask({"mask": "(9999) 999.99.99"});

function btnShow(id){
    let button = document.getElementById("btn_show_" + id);

    let cedula = button.dataset.cedula;
    let direccion = button.dataset.direccion;
    let telefono = button.dataset.telefono;
    

    $("#modal_cedula").text(cedula);
    $("#modal_direccion").text(direccion);
    $("#modal_telefono").text(telefono);
    $('#id').val(id);

}

function btnEditar(id){

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

    let cedula = button.dataset.cedula;
    let nombre = button.dataset.nombre;
    let telefono = button.dataset.telefono;
    let direccion = button.dataset.direccion;

    $("#input_cedula").val(cedula);
    $("#input_nombre").val(nombre);
    $("#input_telefono").val(telefono);
    $("#input_direccion").val(direccion);
    $('#input_form_id').val(id);
    $("#input_opcion").val("editar");
    titulo.innerText = "Editar";


}

function btnEliminar(id){
    let button = document.getElementById("btn_eliminar_" + id);
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
    titulo.innerText = "Registrar";
});


console.log('personas-app.js');
