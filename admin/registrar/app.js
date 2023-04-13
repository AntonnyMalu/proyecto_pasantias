//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
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

console.log('hi!');