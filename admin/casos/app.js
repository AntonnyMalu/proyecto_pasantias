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
    

});

console.log('hi!');