<?php 
if ($modulo != "dashboard") {
    $urlJs = "../../";
}else{
    $urlJs = "../"; 
}

?>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo $urlJs; ?>plantilla/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo $urlJs; ?>plantilla/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo $urlJs; ?>plantilla/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo $urlJs; ?>plantilla/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo $urlJs; ?>plantilla/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo $urlJs; ?>plantilla/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo $urlJs; ?>plantilla/js/demo/datatables-demo.js"></script>
<script src="<?php echo $urlJs; ?>plantilla/vendor/select2/js/select2.full.min.js"></script>
<!-- Sweetalert2 -->
<script src="<?php echo $urlJs; ?>plantilla/js/sweetalert2.all.min.js"></script>


   <!-- Select2 -->
    <!--<script src="../../plugins/select2/js/select2.full.min.js"></script>-->
    <script src="<?php echo $urlJs; ?>plantilla/vendor/select2/js/select2.full.min.js"></script>

 <!-- Summernote -->
    <!--<script src="../../plugins/summernote/summernote-bs4.min.js"></script>-->
    <script src="<?php echo $urlJs; ?>plantilla/vendor/summernote/summernote-bs4.min.js"></script>
    <!-- include summernote-ko-KR -->
    <!--<script src="lang/summernote-ko-KR.js"></script>-->
    <script src="<?php echo $urlJs; ?>plantilla/vendor/summernote/lang/summernote-es-ES.min.js"></script>
    <script src="<?php echo $urlJs; ?>../resources/inputmask/jquery.inputmask.min.js"></script>
<script>
    console.log("cargar_js!");
</script>
<?php if($modulo != "dashboard" && $modulo != "login" ){ ?>
    <script src="app.js"></script>
 <?php } ?>





