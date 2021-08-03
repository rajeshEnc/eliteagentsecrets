$(document).ready(function(){
    $('.give_code_form .button').on('click', function() {
        var new_panel_value = '';
        var new_value = $('.new_value').val();
        var data_value = $(this).data('value');
        var panel_value = $('.panel_value').val();
        var exact_value = $('.exact_value').val();
        if (data_value !== 'x' && data_value !== 'g') {
            if(exact_value < 6) {
                new_value = new_value + data_value;
                var itemId = panel_value.substring(0, panel_value.length - 1);
                new_panel_value = new_value + itemId;
                $('.panel_value').val(itemId);
                $('.new_value').val(new_value);
                exact_value++;
                $('.exact_value').val(exact_value);
                $('.innahpanel').html(new_panel_value);
            }
        } else if (data_value === 'x') {
            $('.exact_value').val(0);
            $('.new_value').val('');
            $('.panel_value').val('000000');
            $('.innahpanel').html('000000');
        } else if (data_value === 'g') {
            if (parseInt(exact_value) === 6) {
                sessionStorage.setItem('panelValue', new_value);
                $('.innahpanel').html('FUKYES').css('color', 'green');
                setTimeout(function(){
                    window.location.href = '/user/register';
                }, 3000);
            }
        }
    });

    //show hide password on click eye icon on registration form
    $("body").on('click', '.reg_eye', function() {
        // $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $("#reg_password");
        if (input.attr("type") === "password") {

          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
    });
});
