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
    let geografica_id = button.dataset.geografica_id;
    let administrativa_id  = button.dataset.administrativa_id;
    let cargos_id = button.dataset.cargos_id;

    $('#input_cedula').val(cedula);
    $('#input_nombre').val(nombre);
    $('#select_geografica').val(geografica_id);
    $('#select_geografica').trigger('change');
    $('#select_administrativa').val(administrativa_id);
    $('#select_administrativa').trigger('change');
    $('#select_cargos').val(cargos_id);
    $('#select_cargos').trigger('change');
    $('#input_opcion').val("editar");
    $('#input_form_id').val(id);
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
    let geografica_id = button.dataset.geografica_id;
    let administrativa_id  = button.dataset.administrativa_id;
    let path = button.dataset.path;


    //identificamos los input
    let modal_nombre = document.getElementById("modal_nombre_trabajador");
    let modal_administrativa = document.getElementById("modal_ubicacion_administrativa");
    let modal_geografica = document.getElementById("modal_ubicacion_geografica");
    let modal_estatus = document.getElementById("modal_estatus_carnet");
    


    //cambiamos el valor de los input y el titulo del CARDVIEW
    modal_nombre.innerText = nombre;
    modal_administrativa.innerText = administrativa_id;
    modal_geografica.innerText = geografica_id;
    $('#link_modal_id').attr('href', '../foto/?id=' + id);
    $("#modal_imagen").attr("src", path);
    //$('#btn_descargar').attr('href', '../../../img/fotos_carnet/nomina_id_1/001_19160501.png');
    $('#btn_descargar').attr('href', path);
    $('#btn_descargar').attr('download','CI_'+ cedula);
}

console.log('nomina-app.js');
