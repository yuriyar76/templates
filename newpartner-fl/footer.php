<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
    die();
}

$arResult['USER'] = $_SESSION['user_current'];
$name = $arResult['USER']['name'];
$lastname = $arResult['USER']['lastName'];
$phone =  $arResult['USER']['phone'];
$adress =  $arResult['USER']['adress'];
$fullname = $name.' '.$lastname;

//dump( $arResult);
?>
<!-- /.container-fluid -->
</div>
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">

    <div class="container my-auto">
        <div class="copyright text-center my-auto">
           <span>&copy; мнбши оюпрмеп 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<?php
   require_once (__DIR__.'/inc/modal.inc.php');
?>

<!-- Bootstrap core JavaScript-->
<!--<script src="/bitrix/templates/newpartner-fl/vendor/jquery/jquery.min.js"></script>-->

<script src="/bitrix/templates/newpartner-2016/js/jquery-1.11.2.min.js"></script>
<script src="/bitrix/templates/newpartner-fl/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/bitrix/templates/newpartner-2016/js/jquery-ui-new.js"></script>
<script src="/bitrix/templates/newpartner-2016/js/jquery.ui.widget.js"></script>
<script src="/bitrix/templates/newpartner-2016/js/jquery.fileupload.js"></script>
<script src="/bitrix/templates/newpartner-2016/js/jquery.cookie.js"></script>
<script src="/bitrix/templates/newpartner-2016/js/jquery.maskedinput.min.js"></script>
<script src="/bitrix/templates/newpartner-2016/js/scripts.js"></script>
<script src="/bitrix/templates/newpartner-2016/js/script.js"></script>
<script src="/bitrix/templates/newpartner-fl/js/scripts.js"></script>

<!-- Core plugin JavaScript-->
<script src="/bitrix/templates/newpartner-fl/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/bitrix/templates/newpartner-fl/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/bitrix/templates/newpartner-fl/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/bitrix/templates/newpartner-fl/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/bitrix/templates/newpartner-fl/js/demo/datatables-demo.js"></script>
<script type="text/javascript">$(window).on('load', function () {
        let $preloader = $('#p_prldr'),
            $svg_anm   = $preloader.find('.svg_anm');
        $svg_anm.fadeOut();
        $preloader.delay(500).fadeOut('slow');
    });
</script>
<!--<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>-->
</body>
</html>