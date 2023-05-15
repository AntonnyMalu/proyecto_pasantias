$('#input_rif').inputmask({"mask": "A-9{1,8}-9"});
$('#input_telefono').inputmask({"mask": "(9999) 999.99.99"});

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

$(".edit-empre").click(function(e){

    e.preventDefault();

    //mostramos un Loading
    Swal.fire({
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
        },
    });

    //obtenemos los datos
    let rif = this.dataset.rif;
    let nombre = this.dataset.nombre;
    let responsable = this.dataset.responsable;
    let telefono = this.dataset.telefono;
    let id = this.dataset.id;

    //identificamos los input
    let input_rif = document.getElementById("input_rif");
    let input_nombre = document.getElementById("input_nombre");
    let input_responsable = document.getElementById("input_responsable");
    let input_telefono = document.getElementById("input_telefono");
    let input_opcion = document.getElementById("input_opcion");
    let empresas_id = document.getElementById("input_empresas_id");
    let titulo = document.getElementById("titulo_form");



    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_rif.value = rif;
    input_nombre.value = nombre;
    input_responsable.value = responsable;
    input_telefono.value = telefono;
    input_empresas_id.value = id;
    input_opcion.value = "editar";
    titulo.innerText = "Editar Empresa";

});

//ELIMINAR USUARIO
$(".elim-empre").click(function(e){

    e.preventDefault();
    //obtenemos los datos
    let id = this.dataset.id;

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

});


//CAMBIAR TITULO EN EL CARDVIEW
$("#btn_cancelar").click(function(e){
    let titulo = document.getElementById("titulo_form");
    titulo.innerText = "Crear Usuario";
});


console.log('instituciones-app.js');
