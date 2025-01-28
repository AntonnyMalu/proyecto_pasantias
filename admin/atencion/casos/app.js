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
$(".elim-caso").click(function(e){

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
    let cedula = this.dataset.cedula;
    let nombre = this.dataset.nombre;
    let telefono = this.dataset.telefono;
    let direccion = this.dataset.direccion;
    let fecha = this.dataset.fecha;
    let hora = this.dataset.hora;
    let donativo = this.dataset.donativo;
    let tipo = this.dataset.tipo;
    let observacion = this.dataset.observacion;
    let id = this.dataset.id;
    let xstatus = this.dataset.xstatus;

    //identificamos los input
    let input_cedula = document.getElementById("modal_cedula");
    let input_nombre = document.getElementById("modal_nombre");
    let input_telefono = document.getElementById("modal_telefono");
    let input_direccion = document.getElementById("modal_direccion");
    let input_fecha = document.getElementById("modal_fecha");
    let input_hora = document.getElementById("modal_hora");
    let input_donativo = document.getElementById("modal_donativo");
    let input_tipo = document.getElementById("modal_tipo");
    let input_observacion = document.getElementById("modal_observacion");
    let input_titulo = document.getElementById("modal_titulo");
    let casos_id = document.getElementById("casos_id");
    let span_boton = document.getElementById("ver_botones_modal");
    let span_reset = document.getElementById("ver_boton_reset");
    let span_label_estatus = document.getElementById("ver_label_estatus");


    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_cedula.innerText = cedula;
    input_nombre.innerText = nombre;
    input_telefono.innerText = telefono;
    input_direccion.innerText = direccion;
    input_fecha.innerText = fecha;
    input_hora.innerText = hora;
    input_donativo.innerText = donativo;
    input_tipo.innerText = tipo;
    input_observacion.innerText = observacion;
    input_titulo.innerText = nombre;
    casos_id.value = id;

    if(xstatus != ""){
        span_label_estatus.innerText = xstatus;
        span_boton.classList.add("d-none");
        span_reset.classList.remove("d-none");
    }else{
        span_boton.classList.remove('d-none');
        span_reset.classList.add("d-none");
    }

    $("#enlace_productos").attr("href", "../productos/index.php?id=" + id);



   
   
    

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

console.log('casos-app.js');