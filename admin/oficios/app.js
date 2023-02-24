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

    //identificamos los input
    let input_rif = document.getElementById("modal_rif");
    let input_fecha = document.getElementById("modal_fecha");
    let input_requerimientos = document.getElementById("modal_requerimientos");
    let input_cedula = document.getElementById("modal_cedula");
    let input_nombre = document.getElementById("modal_nombre");
    let input_telefono = document.getElementById("modal_telefono");
    let input_direccion = document.getElementById("modal_direccion");
    let input_titulo = document.getElementById("modal_titulo");
    
 



    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_rif.innerText = rif;
    input_fecha.innerText = fecha;
    input_requerimientos.innerText = requerimientos;
    input_cedula.innerText = cedula;
    input_nombre.innerText = nombre;
    input_telefono.innerText = telefono;
    input_direccion.innerText = direccion;
    input_titulo.innerText = nombrei;
    

});

console.log('hi!');
