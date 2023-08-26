<footer></footer>

<?php wp_footer(); ?>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
<script>
  const input = document.querySelector("#phone");
  window.intlTelInput(input, {
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
  });
</script>
<!--<script src="<?php echo get_template_directory_uri() ?>/js/jquery.maskedinput.min.js"></script>-->
<script src="<?php echo get_template_directory_uri() ?>/js/main.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/form.js"></script>

<script>
    /*jQuery (function ($) {
        $(function() {
            function maskPhone() {
                var country = $('#country option:selected').val();
                switch (country) {
                    case "ru":
                        $("#phone").mask("+7(999) 999-99-99");break;
                    case "ua":
                        $("#phone").mask("+380(999) 999-99-99");break;
                    case "by":
                        $("#phone").mask("+375(999) 999-99-99");break;
                }
            }
            maskPhone();
            $('#country').change(function() {
                maskPhone();
            });
        });
    });*/
</script>

</body>
</html>
