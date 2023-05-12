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


$("#btn_add").click(function (e) { 
    e.preventDefault();
    let contador = document.getElementById("contador");
    let valor_actual = contador.dataset.contador;
    let valor_nuevo = parseInt(valor_actual) + 1;
    contador.dataset.contador = valor_nuevo;
    let input_actual = contador.value;
    let input_nuevo = parseInt(input_actual) + 1;
    contador.value = input_nuevo;
    let content = '' +
    '<div class="row" id="item_' + input_nuevo + '">' +
        '<div class="col-10">' +
            '<input type="text" class="form-control" name="ruta_' + input_nuevo + '" placeholder="Lugar" id="ruta_' + input_nuevo + '" required />' +
        '</div>' +
        '<div class="col-2 p-1">' +
            '<button type="button" class="btn btn-danger btn-circle btn-sm" onclick="btnRemove(\'item_' + input_nuevo + '\')">' +
            '<i class="fa fa-minus"></i>' +
            '</button>' +
        '</div>' +
    '</div>';

    $('#items').append(content);
    //alert(valor_nuevo);
});

function btnRemove(item)
{
    let contador = document.getElementById("contador");
    let row = document.getElementById(item);
    let valor_actual = contador.dataset.contador;
    let valor_nuevo = parseInt(valor_actual) - 1;
    contador.dataset.contador = valor_nuevo;
    row.remove();
}


$("#seleccionar_origen").change(function (e) { 
    e.preventDefault();
    var seleccion= $(this).children("option:selected").val();
    //alert("Has seleccionado - " + seleccion);
    let input = document.getElementById("input_origen");
    input.value = seleccion;
});

$("#seleccionar_destino").change(function (e) { 
    e.preventDefault();
    var seleccion= $(this).children("option:selected").val();
    //alert("Has seleccionado - " + seleccion);
    let input = document.getElementById("input_destino");
    input.value = seleccion;
});

$(".delete-ruta").click(function(e){

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

$(".edit-ruta").click(function(e){

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
    let origen = this.dataset.origen;
    let destino = this.dataset.destino;
    let id = this.dataset.id;
    let id_html = this.dataset.id_html;

    //identificamos los input
    let input_opcion= document.getElementById("input_opcion");
    let titulo = document.getElementById("titulo_form");
    let input_html = document.getElementById(id_html);
    let html = input_html.value;
    let contador = input_html.dataset.contador;
    let items = document.getElementById("items");
    let input_id = document.getElementById('input_rutas_id');
    let input_contador = document.getElementById('contador');
    



    //cambiamos el valor de los input y el titulo del CARDVIEW
    $("#seleccionar_origen").val(origen);
    $('#seleccionar_origen').trigger('change');
    $("#seleccionar_destino").val(destino);
    $('#seleccionar_destino').trigger('change');
    input_opcion.value = "editar";
    titulo.innerText = "Editar Ruta";
    items.innerHTML = html;
    input_id.value = id;
    input_contador.value = contador;
});


//CAMBIAR TITULO EN EL CARDVIEW
$("#btn_cancelar").click(function(e){
    let titulo = document.getElementById("titulo_form");
    titulo.innerText = "Crear Ruta";
    $("#seleccionar_origen").val("");
    $('#seleccionar_origen').trigger('change');
    $("#seleccionar_destino").val("");
    $('#seleccionar_destino').trigger('change');
    let content = '' +
    '<div class="row" id="item_1">' +
        '<div class="col-10">' +
            '<input type="text" class="form-control" name="ruta_1" placeholder="Lugar" id="ruta_1" required />' +
        '</div>' +
        '<div class="col-2 p-1">' +
            '&nbsp;' +
        '</div>' +
    '</div>';
    let item = document.getElementById('items');
    let contador = document.getElementById('contador');
    contador.dataset.contador = 1;
    item.innerHTML = content;
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

console.log('rutas-app.js');
