//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
});

$('#summernote').summernote({
    lang: 'es-ES' // default: 'en-US'
});

$("#personas_id").change(function () {
    let estado = $("#personas_id").val();
    let cedula;
    let nombre;
    let telefono;
    let direccion;

    if (estado != "") {
        if (estado != -1) {
            let hidden = document.getElementById("data_" + estado);
            cedula = hidden.dataset.cedula;
            nombre = hidden.dataset.nombre;
            telefono = hidden.dataset.telefono;
            direccion = hidden.dataset.direccion;
        } else {
            cedula = null;
            nombre = null;
            telefono = null;
            direccion = null;
        }
    } else {
        cedula = null;
            nombre = null;
            telefono = null;
            direccion = null;
    }
    let input_cedula = document.getElementById("input_cedula");
    let input_nombre = document.getElementById("input_nombre");
    let input_telefono = document.getElementById("input_telefono");
    let input_direccion = document.getElementById("input_direccion");

    input_cedula.value = cedula;
    input_nombre.value = nombre;
    input_telefono.value = telefono;
    input_direccion.value = direccion;

});

$("#instituciones_id").change(function () {
    let estado = $("#instituciones_id").val();
    let rif;
    let nombre;
    let telefono;
    let direccion;
    let requerimientos;

    if (estado != "") {
        if (estado != -1) {
            let hidden = document.getElementById("instituciones_" + estado);
            rif = hidden.dataset.rif;
            nombre = hidden.dataset.nombre;
            telefono = hidden.dataset.telefono;
            direccion = hidden.dataset.direccion;
            requerimientos = hidden.dataset.requerimientos;
        } else {
            rif = null;
            nombre = null;
            telefono = null;
            direccion = null;
            requerimientos = null;
        }
    } else {
            rif = null;
            nombre = null;
            telefono = null;
            direccion = null;
            requerimientos = null;
    }
    let input_rif = document.getElementById("input_insti_rif");
    let input_nombre = document.getElementById("input_insti_nombre");
    let input_telefono = document.getElementById("input_insti_telefono");
    let input_direccion = document.getElementById("input_insti_direccion");
    let input_requrimientos = document.getElementById("input_requerimientos");

    input_rif.value = rif;
    input_nombre.value = nombre;
    input_telefono.value = telefono;
    input_direccion.value = direccion;
    input_requerimientos.value = requerimientos;

});

console.log('hi!');