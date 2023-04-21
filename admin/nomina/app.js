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

$(".show").click(function(e){

    e.preventDefault();

    //obtenemos los datos
    let id = this.dataset.id;

    //identificamos los input
    /**let input_cedula = document.getElementById("modal_cedula");
    let input_telefono = document.getElementById("modal_telefono");
    let input_direccion = document.getElementById("modal_direccion");
    let input_titulo = document.getElementById("modal_titulo");**/
    


    //cambiamos el valor de los input y el titulo del CARDVIEW
    /**input_cedula.innerText = cedula;
    input_telefono.innerText = telefono;
    input_direccion.innerText = direccion;
    input_titulo.innerText = nombre;*/

});

console.log('hi!');
