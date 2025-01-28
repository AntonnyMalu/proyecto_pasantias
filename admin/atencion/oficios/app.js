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

//ELIMINAR USUARIO

$(".elim-ofi").click(function(e){

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

$(".show-person").click(function(e){

    e.preventDefault();

    //obtenemos los datos
    let rif = this.dataset.rif;
    let fecha = this.dataset.fecha;
    let requerimientos = this.dataset.requerimientos;
    let nombrei = this.dataset.nombrei;
    let cedula = this.dataset.cedula;
    let nombre = this.dataset.nombre;
    let telefono = this.dataset.telefono;
    let direccion = this.dataset.direccion;
    let id = this.dataset.id;
    let xstatus = this.dataset.xstatus;

    //identificamos los input
    let input_rif = document.getElementById("modal_rif");
    let input_fecha = document.getElementById("modal_fecha");
    let input_requerimientos = document.getElementById("modal_requerimientos");
    let input_cedula = document.getElementById("modal_cedula");
    let input_nombre = document.getElementById("modal_nombre");
    let input_telefono = document.getElementById("modal_telefono");
    let input_direccion = document.getElementById("modal_direccion");
    let input_titulo = document.getElementById("modal_titulo");
    let casos_id = document.getElementById("casos_id");
    let span_boton = document.getElementById("ver_botones_modal");
    let span_reset = document.getElementById("ver_boton_reset");
    let span_label_estatus = document.getElementById("ver_label_estatus");
 



    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_rif.innerText = rif;
    input_fecha.innerText = fecha;
    input_requerimientos.innerText = requerimientos;
    input_cedula.innerText = cedula;
    input_nombre.innerText = nombre;
    input_telefono.innerText = telefono;
    input_direccion.innerText = direccion;
    input_titulo.innerText = nombrei;
    casos_id.value = id;

    if(xstatus != ""){
        span_label_estatus.innerText = xstatus;
        span_boton.classList.add("d-none");
        span_reset.classList.remove("d-none");
    }else{
        span_boton.classList.remove('d-none');
        span_reset.classList.add("d-none");
    }

});

$(".cambiar-status").click(function(e){

    e.preventDefault();

    

    //obtenemos los datos
    let status = this.dataset.hola;

    //identificamos los input
    let input_status = document.getElementById("casos_status");
    let formulario = document.getElementById("formulario_status");

    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_status.value = status;
    formulario.submit();

    //alert('que eszta poasanbdo' + status);


});

console.log('oficios-app.js');
