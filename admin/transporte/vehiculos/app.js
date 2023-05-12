//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
});

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

$(".edit-vehiculo").click(function(e){

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
    let empresa_id = this.dataset.empresa_id;
    let placa = this.dataset.placa;
    let chuto = this.dataset.chuto;
    let tipo = this.dataset.tipo;
    let marca = this.dataset.marca;
    let color = this.dataset.color;
    let capacidad = this.dataset.capacidad;
    let id = this.dataset.id;

    //identificamos los input
    let input_placa = document.getElementById("input_placa");
    let input_chuto = document.getElementById("input_chuto");
    let input_tipo = document.getElementById("input_tipo");
    let input_marca = document.getElementById("input_marca");
    let input_color = document.getElementById("input_color");
    let input_capacidad = document.getElementById("input_capacidad");
    let input_opcion = document.getElementById("input_opcion");
    let input_vehiculos_id = document.getElementById("input_vehiculos_id");
    let titulo = document.getElementById("titulo_form");


    //cambiamos el valor de los input y el titulo del CARDVIEW
    $("#seleccionar_empresa").val(empresa_id);
    $('#seleccionar_empresa').trigger('change');
    input_placa.value = placa;
    input_chuto.value = chuto;
    input_tipo.value = tipo;
    input_marca.value = marca;
    input_color.value = color;
    input_capacidad.value = capacidad;
    input_vehiculos_id.value = id;
    input_opcion.value = "editar";
    titulo.innerText = "Editar Vehículos";
});

//ELIMINAR USUARIO
$(".elim-vehi").click(function(e){

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
    titulo.innerText = "Registrar Vehículo";
    $("#seleccionar_empresa").val("");
    $('#seleccionar_empresa').trigger('change');
});


$(".show-vehi").click(function(e){

    e.preventDefault();

    //obtenemos los datos
    let rif = this.dataset.rif;
    let nombre = this.dataset.nombre;
    let responsable = this.dataset.responsable;
    let telefono = this.dataset.telefono;
    let id = this.dataset.id;
    let color = this.dataset.color;
    let chuto = this.dataset.chuto;

    //identificamos los input
    let input_rif = document.getElementById("modal_rif");
    let input_nombre = document.getElementById("modal_nombre");
    let input_responsable = document.getElementById("modal_responsable");
    let input_telefono = document.getElementById("modal_telefono");
    let input_color = document.getElementById("modal_color");
    let modal_chuto = document.getElementById("modal_chuto");

    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_rif.innerText = rif;
    input_nombre.innerText = nombre;
    if(responsable){
        input_responsable.innerText = responsable;
    }else{
        input_responsable.innerText = "-";
    }
    if(telefono){
        input_telefono.innerText = telefono;
    }else{
        input_telefono.innerText = "-";
    }
    input_color.innerText = color;
    modal_chuto.innerText = chuto;

});

console.log('vehiculos-app.js');
