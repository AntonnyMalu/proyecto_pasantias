//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
});

$("#xxxxxxx").submit(function (e) {

    e.preventDefault();
    let input_opcion = document.getElementById("input_opcion").value;
    let input_password = document.getElementById("input_password").value;
    let input_confirmar = document.getElementById("input_confirmar").value;

    // GUARDAR
    if (input_opcion === "guardar"){

        if (input_password.length === 0 || input_confirmar.length === 0){

             return Swal.fire({
                icon: 'error',
                text: 'Llena todos los campos de la contraseña'
            });

            //return alert("Llena todos los campos de la contraseña");

        }else {

            if (input_password === input_confirmar){
                this.submit();
            } else {

                return Swal.fire({
                    icon: 'warning',
                    text: 'Las contraseñas no coinciden.'
                });

                //return alert("Las contraseñas no coinciden.");
            }

        }

    }

    //EDITAR
    if (input_opcion === "editar"){

        if (input_password === input_confirmar){
            this.submit();
        } else {
            return Swal.fire({
                icon: 'warning',
                text: 'Las contraseñas no coinciden.'
            });
            //return alert("Las contraseñas no coinciden.");
        }

    }

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

console.log('registrar-app.js');