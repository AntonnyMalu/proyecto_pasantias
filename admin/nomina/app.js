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

$(".elim-nomi").click(function(e){

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

$(".show-nomina").click(function(e){

    e.preventDefault();

    //obtenemos los datos
    let id = this.dataset.id;
    let nombre = this.dataset.nombre;
    let geografica = this.dataset.geografica;
    let administrativa = this.dataset.administrativa;
    let estatus = this.dataset.estatus;

    //identificamos los input
    let modal_nombre = document.getElementById("modal_nombre_trabajador");
    let modal_administrativa = document.getElementById("modal_ubicacion_administrativa");
    let modal_geografica = document.getElementById("modal_ubicacion_geografica");
    let modal_estatus = document.getElementById("modal_estatus_carnet");
    


    //cambiamos el valor de los input y el titulo del CARDVIEW
    modal_nombre.innerText = nombre;
    modal_administrativa.innerText = administrativa;
    modal_geografica.innerText = geografica;
    modal_estatus.innerText = estatus;

});

console.log('nomina-app.js');
