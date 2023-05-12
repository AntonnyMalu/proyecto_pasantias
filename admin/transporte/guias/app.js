//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
});

$('#seleccionar_tipo_guia').change(function (e) { 
    e.preventDefault();
    let id_tipo = this.value;
    let nuevo = this.dataset.nuevo;
    let tipo_codigo = document.getElementById("tipo_codigo_" + id_tipo).value;
    let input_codigo = document.getElementById("input_codigo");
    let codigo = input_codigo.dataset.codigo_nuevo;
    let new_codigo="";
    if(nuevo === "nuevo"){
        new_codigo = tipo_codigo +"-"+ codigo;
    }else{
        let string = input_codigo.value;
        let posiciones = string.split('-');
        if(tipo_codigo != ""){
            new_codigo = tipo_codigo +"-"+ posiciones[1]+"-"+ posiciones[2];
        }else{
            new_codigo = string;

        }
    }
    input_codigo.value = new_codigo;
    
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
        '<div class="col-3">' +
        '<input type="text" class="form-control" name="cantidad_' + input_nuevo + '" placeholder="Cant." id="cantidad_' + input_nuevo + '" required />' +
        '</div>' +
        '<div class="col-7">' +
        '<input type="text" class="form-control" name="descripcion_' + input_nuevo + '" placeholder="Descripción" id="descripcion_' + input_nuevo + '" required />' +
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

function btnRemove(item) {
    let contador = document.getElementById("contador");
    let row = document.getElementById(item);
    let valor_actual = contador.dataset.contador;
    let valor_nuevo = parseInt(valor_actual) - 1;
    contador.dataset.contador = valor_nuevo;
    row.remove();
}

$("#btn_cancelar").click(function (e) {
    let titulo = document.getElementById("titulo_form");
    titulo.innerText = "Nueva Guia";
    let tipo_guia = document.getElementById("seleccionar_tipo_guia");
    tipo_guia.dataset.nuevo = "nuevo";
    $("#seleccionar_tipo_guia").val("");
    $('#seleccionar_tipo_guia').trigger('change');
    $("#seleccionar_vehiculo").val("");
    $('#seleccionar_vehiculo').trigger('change');
    $("#seleccionar_chofer").val("");
    $('#seleccionar_chofer').trigger('change');
    $("#seleccionar_origen").val("");
    $('#seleccionar_origen').trigger('change');
    $("#seleccionar_destino").val("");
    $('#seleccionar_destino').trigger('change');
    let content = '' +
        '<div class="row" id="item_1">' +
        '<div class="col-3">' +
        '<input type="text" class="form-control" name="cantidad_1" placeholder="Cant." id="cantidad_1" required />' +
        '</div>' +
        '<div class="col-7">' +
        '<input type="text" class="form-control" name="descripcion_1" placeholder="Descripción" id="descripcion_1" required />' +
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

function btnShow(id)
{
    let button = document.getElementById("btn_show_" + id);
    let html = document.getElementById("data_carga_guia_" + id).value;
    let tipo = button.dataset.tipo;
    let codigo = button.dataset.codigo;
    let vehiculo = button.dataset.vehiculo;
    let chofer = button.dataset.chofer;
    let origen = button.dataset.origen;
    let destino = button.dataset.destino;
    let fecha = button.dataset.fecha;

    let modal_tipo = document.getElementById("modal_tipo");
    let modal_codigo = document.getElementById("modal_codigo");
    let modal_vehiculo = document.getElementById("modal_vehiculo");
    let modal_chofer = document.getElementById("modal_chofer");
    let modal_origen = document.getElementById("modal_origen");
    let modal_destino = document.getElementById("modal_destino");
    let modal_fecha = document.getElementById("modal_fecha");
    let modal_cargamento = document.getElementById("modal_tbody_data_carga");

    modal_tipo.innerText = tipo;
    modal_codigo.innerText = codigo;
    modal_vehiculo.innerText = vehiculo;
    modal_chofer.innerText = chofer;
    modal_origen.innerText = origen;
    modal_destino.innerText = destino;
    modal_fecha.innerText = fecha;
    modal_cargamento.innerHTML = html;

}

function btnEdit(id)
{
    let button = document.getElementById("btn_editar_" + id);
    let html = document.getElementById("edit_carga_guia_" + id).value;

    let tipos_id = button.dataset.tipos_id;
    let codigo = button.dataset.codigo;
    let vehiculos_id = button.dataset.vehiculos_id;
    let choferes_id = button.dataset.choferes_id;
    let territorios_origen = button.dataset.territorios_origen;
    let territorios_destino = button.dataset.territorios_destino;
    let fecha = button.dataset.fecha;
    let id_guia = button.dataset.id_guia;
    let contador = button.dataset.contador;

    let items = document.getElementById("items");
    let select_tipo_guia = document.getElementById("seleccionar_tipo_guia");
    select_tipo_guia.dataset.nuevo = "editar";

    items.innerHTML = html;
    
    $("#input_codigo").val(codigo);
    $("#seleccionar_vehiculo").val(vehiculos_id);
    $('#seleccionar_vehiculo').trigger('change');
    $("#seleccionar_chofer").val(choferes_id);
    $('#seleccionar_chofer').trigger('change');
    $("#seleccionar_origen").val(territorios_origen);
    $('#seleccionar_origen').trigger('change');
    $("#seleccionar_destino").val(territorios_destino);
    $('#seleccionar_destino').trigger('change');
    $("#input_fecha").val(fecha);
    $("#seleccionar_tipo_guia").val(tipos_id);
    $('#seleccionar_tipo_guia').trigger('change');
    $('#input_form_id').val(id_guia);
    $("#input_opcion").val("editar");
    $('#contador').val(contador);
}


console.log('guias_js');
