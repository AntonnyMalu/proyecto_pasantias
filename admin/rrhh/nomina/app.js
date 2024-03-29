//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4', 
    dropdownParent: $('#modal_form')
});

$('#input_cedula').inputmask("9{1,8}");

$(".evento").click(function(e){

    //e.preventDefault();

    
    //mostramos un Loading
    Swal.fire({
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
        },
    });
});


function btnEditar(id)
{

    let button = document.getElementById('btn_editar_' + id);
    let cedula = button.dataset.cedula;
    let nombre = button.dataset.nombre;
    let apellido = button.dataset.apellido;
    let geografica_id = button.dataset.geografica_id;
    let administrativa_id  = button.dataset.administrativa_id;
    let cargos_id = button.dataset.cargos_id;
    let estatus = button.dataset.estatus;

    $('#input_cedula').val(cedula);
    $('#input_nombre').val(nombre);
    $('#input_apellido').val(apellido);
    $('#select_geografica').val(geografica_id);
    $('#select_geografica').trigger('change');
    $('#select_administrativa').val(administrativa_id);
    $('#select_administrativa').trigger('change');
    $('#select_cargos').val(cargos_id);
    $('#select_cargos').trigger('change');
    $('#input_opcion').val("editar");
    $('#input_form_id').val(id);
    $('#estatus').val(estatus);
    $('#estatus').trigger('change ');
}

//ELIMINAR USUARIO
function btnEliminar(id)
{
    //identificamos el formulario
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

function btnShow(id)
{
    //obtenemos los datos
    let button = document.getElementById('btn_show_' + id);
    let cedula = button.dataset.cedula;
    let nombre = button.dataset.nombre;
    let apellido = button.dataset.apellido;
    let geografica_id = button.dataset.geografica_id;
    let administrativa_id  = button.dataset.administrativa_id;
    let path = button.dataset.path;
    let descargar= button.dataset.descargar;
    let estatus = button.dataset.estatus;


    //identificamos los input
    let modal_nombre = document.getElementById("modal_nombre_trabajador");
    let modal_administrativa = document.getElementById("modal_ubicacion_administrativa");
    let modal_geografica = document.getElementById("modal_ubicacion_geografica");
    let modal_estatus = document.getElementById("modal_estatus_carnet");
    let modal_estatus_trabajador = document.getElementById("modal_estatus_trabajador");
    


    //cambiamos el valor de los input y el titulo del CARDVIEW
    modal_nombre.innerText = nombre + " " +apellido;
    modal_administrativa.innerText = administrativa_id;
    modal_geografica.innerText = geografica_id;
    modal_estatus_trabajador.innerText = estatus;
    $('#link_modal_id').attr('href', '../foto/?id=' + id);
    $('#btn_pdf').attr('href', 'pdf/?id=' + id);
    $("#modal_imagen").attr("src", path);
    $('#btn_descargar').attr('href', path);
    $('#btn_descargar').attr('download','CI_'+ cedula);
    if (descargar === "NO") {
        $('#btn_descargar').addClass('d-none');
        $('#btn_pdf').addClass('d-none');
    }else{
        $('#btn_descargar').removeClass('d-none');
        $('#btn_pdf').removeClass('d-none');
    }
}

function restablecerFormulario(){
    $('#input_cedula').val('');
    $('#input_nombre').val('');
    $('#input_apellido').val('');
    $('#select_geografica').val('');
    $('#select_geografica').trigger('change');
    $('#select_administrativa').val('');
    $('#select_administrativa').trigger('change');
    $('#select_cargos').val('');
    $('#select_cargos').trigger('change');
    $('#input_opcion').val('guardar');
    $('#input_form_id').val('');
    

}

console.log('nomina-app.js');
