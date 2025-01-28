$('#input_telefono').inputmask({ "mask": "(9999) 999.99.99" });
$('#input_rif').inputmask({ "mask": "A-9{1,8}-9" });

function btnEditar(id) {
    //mostramos un Loading
    Swal.fire({
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
        },
    });

    let button = document.getElementById("btn_eliminar_" + id);
    let titulo = document.getElementById("titulo_form");

    let rif = button.dataset.rif;
    let nombre = button.dataset.nombre;
    let telefono = button.dataset.telefono;
    let direccion = button.dataset.direccion;

    $("#input_rif").val(rif);
    $('#input_rif').trigger('change');
    $("#input_nombre").val(nombre);
    $('#input_nombre').trigger('change');
    $("#input_telefono").val(telefono);
    $('#input_telefono').trigger('change');
    $("#input_direccion").val(direccion);
    $('#input_direccion').trigger('change');
    $('#input_form_id').val(id);
    $("#input_opcion").val("editar");
    titulo.innerText = "Editar";
}

function btnEliminar(id) {
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
$("#btn_cancelar").click(function (e) {
    let titulo = document.getElementById("titulo_form");
    titulo.innerText = "Crear Usuario";
});


function btnShow(id) {
    let button = document.getElementById("btn_show_" + id);

    let rif = button.dataset.rif;
    let nombre = button.dataset.nombre;
    let telefono = button.dataset.telefono;
    let direccion = button.dataset.direccion;

    $("#modal_rif").text(rif);
    $("#modal_nombre").text(nombre);
    $("#modal_telefono").text(telefono);
    $("#modal_direccion").text(direccion);
    $('#id').val(id);

}

console.log('instituciones-app.js');
