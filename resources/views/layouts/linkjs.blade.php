<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('assets/plugin/bootstrap-growl-master/jquery.bootstrap-growl.min.js') }}"></script>
<script src="{{ asset('assets/plugin/sweetalert2/sweetalert.js') }}"></script>
<script src="{{ asset('assets/vendors/datepicker/js/datepicker.min.js') }}"></script>

<script>

    $('.only-string').keypress(function(e) {
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            e.preventDefault();
        }
    });

    $('.only-number').keypress(function (e){
        var charCode = (e.which) ? e.which : e.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
    });

    $('.only-lowercase').bind('keyup', function (e) {
        if (e.which >= 97 && e.which <= 122) {
            var newKey = e.which - 32;
            // I have tried setting those
            e.keyCode = newKey;
            e.charCode = newKey;
        }

        $('.only-lowercase').val(($('.only-lowercase').val()).toLowerCase());
    });

</script>