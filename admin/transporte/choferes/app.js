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

$(".edit-choferes").click(function(e){

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
    let id = this.dataset.id;
    let empresa_id = this.dataset.empresa_id;
    let vehiculo_id = this.dataset.vehiculo_id;
    let cedula = this.dataset.cedula;
    let nombre = this.dataset.nombre;
    let telefono = this.dataset.telefono;

    //identificamos los input
    let input_cedula = document.getElementById("input_cedula");
    let input_nombre = document.getElementById("input_nombre");
    let input_telefono = document.getElementById("input_telefono");
    let input_opcion = document.getElementById("input_opcion");
    let input_choferes_id = document.getElementById("input_choferes_id");
    let titulo = document.getElementById("titulo_form");


    //cambiamos el valor de los input y el titulo del CARDVIEW
    $("#seleccionar_empresa").val(empresa_id);
    $('#seleccionar_empresa').trigger('change');
    $("#seleccionar_vehiculo").val(vehiculo_id);
    $('#seleccionar_vehiculo').trigger('change');
    input_cedula.value = cedula;
    input_nombre.value = nombre;
    input_telefono.value = telefono;
    input_choferes_id.value = id;
    input_opcion.value = "editar";
    titulo.innerText = "Editar Chofer";

});

//ELIMINAR USUARIO
$(".elim-chof").click(function(e){

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
    titulo.innerText = "Registrar Chofer";
    $("#seleccionar_empresa").val("");
    $('#seleccionar_empresa').trigger('change');
    $("#seleccionar_vehiculo").val("");
    $('#seleccionar_vehiculo').trigger('change');
});

$(".show-inst").click(function(e){

    e.preventDefault();

    //obtenemos los datos
    let rif = this.dataset.rif;
    let nombre = this.dataset.nombre;
    let telefono = this.dataset.telefono;
    let direccion = this.dataset.direccion;
    let id = this.dataset.id;

    //identificamos los input
    let input_rif = document.getElementById("modal_rif");
    let input_nombre = document.getElementById("modal_nombre");
    let input_telefono = document.getElementById("modal_telefono");
    let input_direccion = document.getElementById("modal_direccion");
 



    //cambiamos el valor de los input y el titulo del CARDVIEW
    input_rif.innerText = rif;
    input_nombre.innerText = nombre;
    input_telefono.innerText = telefono;
    input_direccion.innerText = direccion;
    

});

$(".show-choferes").click(function(e){

    e.preventDefault();

    //obtenemos los datos
    let id = this.dataset.id;
    let rif = this.dataset.rif;
    let nombre = this.dataset.nombre;
    let responsable = this.dataset.responsable;
    let telefono = this.dataset.telefono;
    let placa = this.dataset.placa;
    let marca = this.dataset.marca;
    let tipo = this.dataset.tipo;
    let color = this.dataset.color;
    let nombre_modal =this.dataset.chofer_nombre;
    let chuto = this.dataset.chuto;


    //identificamos los input
    let input_rif = document.getElementById("modal_rif");
    let input_nombre = document.getElementById("modal_nombre");
    let input_responsable = document.getElementById("modal_responsable");
    let input_telefono = document.getElementById("modal_telefono");
    let input_placa = document.getElementById("modal_placa");
    let input_marca = document.getElementById("modal_marca");
    let input_tipo = document.getElementById("modal_tipo");
    let input_color = document.getElementById("modal_color");
    let input_chofer_nombre = document.getElementById("label_chofer_nombre");
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
    input_placa.innerText = placa;
    input_marca.innerText = marca;
    input_tipo.innerText = tipo;
    input_color.innerText = color;
    input_chofer_nombre.innerText = nombre_modal;
    modal_chuto.innerText = chuto;
    
    

});



console.log('choferes-app.js');
