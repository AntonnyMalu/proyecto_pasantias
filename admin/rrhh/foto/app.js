$('#file_img').change(function (e) {
    e.preventDefault();
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#vista_previa_foto').attr('src', e.target.result);
            $('#input_ruta_img').val('img_subida');
            $('#btn_submit_form').removeAttr('disabled');
        }
        reader.readAsDataURL(this.files[0]);
    }

});

$('#btn_cancelar').click(function (e) { 
    //e.preventDefault();
    $('#btn_submit_form').attr('disabled', true);
    $('#vista_previa_foto').attr('src', '../../../img/img_placeolder.png');
    $('#estado').text("");
});



console.log('foto-app.js');
