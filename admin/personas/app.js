$('#input_cedula').inputmask("9{1,8}");
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

$(".edit-person").click(function(e){

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
    let cedula = this.dataset.cedula;
    let nombre = this.dataset.nombre;
    let telefono = this.dataset.telefono;
    let direccion = this.dataset.direccion;
    let id = this.dataset.id;

    //identificamos los input
    let input_cedula = document.getElementById("input_cedula");
    let input_nombre = document.getElementById("input_nombre");
    let input_telefono = document.getElementById("input_telefono");
    let input_direccion = document.getElementById("input_direccion");
    let input_opcion = document.getElementById("input_opcion");
    let input_personas_id = document.getElementById("input_personas_id");
    let titulo = document.getElementById("titulo_form");



    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_cedula.value = cedula;
    input_nombre.value = nombre;
    input_telefono.value = telefono;
    input_direccion.value = direccion;
    input_personas_id.value = id;
    input_opcion.value = "editar";
    titulo.innerText = "Editar Persona";

});

//ELIMINAR USUARIO
$(".elim-Person").click(function(e){

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

$(".show-person").click(function(e){

    e.preventDefault();

    //obtenemos los datos
    let cedula = this.dataset.cedula;
    let telefono = this.dataset.telefono;
    let direccion = this.dataset.direccion;
    let nombre = this.dataset.nombre;
    let id = this.dataset.id;

    //identificamos los input
    let input_cedula = document.getElementById("modal_cedula");
    let input_telefono = document.getElementById("modal_telefono");
    let input_direccion = document.getElementById("modal_direccion");
    let input_titulo = document.getElementById("modal_titulo");
    
 



    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_cedula.innerText = cedula;
    input_telefono.innerText = telefono;
    input_direccion.innerText = direccion;
    input_titulo.innerText = nombre;

});

console.log('personas-app.js');
